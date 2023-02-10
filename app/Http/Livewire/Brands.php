<?php
namespace App\Http\Livewire;
use App\Helpers\MakeCurlRequest;
use App\Helpers\makeCurlPostRequest;
use App\Helpers\baseUrl;
use Livewire\Component;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\WithFileUploads;
class Brands extends Component
{
    use WithFileUploads;
    public  $brand_id, $name, $image, $category_id;
    public $addBrand = false;
    public $updateMode = false;
    public function render()
    {
    $url = baseUrl().'list/brand';
    $data = makeCurlRequest($url, 'GET');
    // echo "<pre>";print_r($data);die();
    $brands = $data['Brands'];
    $total_brand = $data['total_brand'];
    //pagination
    $page = request()->query('page', 1);
    $perPage = 10;
    $brands = new LengthAwarePaginator(
        array_slice($brands, ($page - 1) * $perPage, $perPage),
        count($brands),
        $perPage,
        $page,
        [
            'path' => request()->url(),
            'query' => request()->query()
        ]
    );
        return view('livewire.brands', compact('brands', 'total_brand'));
    }

    public function add()
    {
        $this->addBrand = true;
    }

    public function updated($field)
    {
        $validatedDate = $this->validateOnly($field,[
            'name' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ]);
    }

    public function addBrand()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ]);
        $image = $this->image;
        $path = $image->getRealPath();
        $postData = [
            'category_id' => $this->category_id,
            'name' => $this->name,
            'image' => new \CURLFile($path, "image/jpeg",$image),
        ];
        $url = ($this->brand_id) ? baseUrl()."edit/brand/".$this->brand_id : baseUrl()."add/brand";
        $data = makeCurlFileRequest($url, 'POST',$postData);
        if($data['success']=true)
        {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => ''.$data['Message'].'']);
        }
        $this->addBrand = false;
        $this->updateMode = false;
        $this->resetInputFields();
    }
    private function resetInputFields()
    {
        $this->brand_id = '';
        $this->name = '';
        $this->image = '';
        $this->category_id = '';
    }

    public function delete($id)
    {  
    $url = baseUrl()."delete/brand/".$id;
    $data = makeCurlRequest($url, 'DELETE');
    if($data['success']=true)
    {
        $this->dispatchBrowserEvent('alert', 
                ['type' => 'success',  'message' => ''.$data['Message'].'']);
    }
    }
    public function edit($id)
    {
        $url = baseUrl()."brand/details/".$id;
        $data = makeCurlRequest($url, 'GET');
        $singleBrand = $data['Brands'];
        $this->brand_id =   $singleBrand['id'];
        $this->category_id =   $singleBrand['id'];
        $this->name = $singleBrand['name'];
        $this->image = $singleBrand['image'];
        $this->updateMode = true;
    }
    

   
}
