<?php
namespace App\Http\Livewire;
use App\Helpers\MakeCurlRequest;
use App\Helpers\makeCurlPostRequest;
use App\Helpers\baseUrl;
use Livewire\Component;
use Illuminate\Pagination\LengthAwarePaginator;
class Sellers extends Component
{
    public $filterSeller = false;
    public $filterType = '';
    public function render()
    {
    $url = baseUrl().'pending/seller/verification/list';
    $data = makeCurlRequest($url, 'GET');
    if($this->filterSeller)
    {
        $sellers = $this->filterSeller;
        $total_sellers = count($sellers);
    }
    else
    {
    $sellers = $data['data'];
    $total_sellers = count($sellers);
    }
    //pagination
    $page = request()->query('page', 1);
    $perPage = 10;
    $sellers = new LengthAwarePaginator(
        array_slice($sellers, ($page - 1) * $perPage, $perPage),
        count($sellers),
        $perPage,
        $page,
        [
            'path' => request()->url(),
            'query' => request()->query()
        ]
    );
        return view('livewire.sellers', compact('sellers', 'total_sellers'));
    }

    public function filterSeller($filterSeller)
    {  
    if($filterSeller=='verified')
    {
      $filter = 'approved/seller/verification/list';
      $filterType='verified';
    }
    elseif($filterSeller=='rejected')
    {
        $filter = 'declined/seller/verification/list';
        $filterType='rejected';
    }
    else
    {
        $filter = 'pending/seller/verification/list';
        $filterType='pending';
    }
    $url = baseUrl().$filter;
    $data = makeCurlRequest($url, 'GET');
    $this->filterSeller = $data['data'];
    $this->filterType = $filterType;
    }

    public function approved($id)
    {
        $url = baseUrl().'approve/seller/request/'.$id;
        $data = makeCurlRequest($url, 'GET');
        if($data['success']==true)
        {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => ''.$data['message'].'']);
        }
    }

    public function rejected($id)
    {
        $url = baseUrl().'decline/seller/request/'.$id;
        $data = makeCurlRequest($url, 'GET');
        if($data['success']==true)
        {
            $this->dispatchBrowserEvent('alert', 
                    ['type' => 'success',  'message' => ''.$data['message'].'']);
        }
    }

    
    

   
}
