<div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Page header -->
        

        <div class="border-t border-slate-200">

            <!-- Components -->
            <div class="space-y-8 mt-8">

                <!-- Input Types -->
                <div>
                    
                    <div class="grid gap-5 md:grid-cols-1">
                        
                        <div>
                            <!-- Start -->
                            <div>
                                <label class="block text-sm font-medium mb-1" for="mandatory">Title <span class="text-rose-500">*</span></label>
                                <input id="mandatory" class="form-input w-full" type="text" wire:model="title" required />
                                @error('title')<div class="text-xs mt-1 text-rose-500">{{ $message }}</div>@enderror
                            </div>
                            <!-- End -->
                        </div>

                        <div>
                            <!-- Start -->
                            <div>
                                <label class="block text-sm font-medium mb-1" for="mandatory">Body <span class="text-rose-500">*</span></label>
                                <textarea id="mandatory" class="form-input w-full" type="text" wire:model="body" required col="5"></textarea>
                                @error('body')<div class="text-xs mt-1 text-rose-500">{{ $message }}</div>@enderror
                            </div>
                            <!-- End -->
                        </div>

                   </div>
                <input type="hidden" wire:model="notification_id">
                <div class="grid gap-5 pt-0 float-right md:grid-cols-2">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div>
                   <button wire:click="addNotification()" class="btn bg-indigo-500 hover:bg-indigo-600 text-white">
                    <svg class="w-4 h-4 fill-current opacity-50 shrink-0" viewBox="0 0 16 16">
                        <path d="M15 7H9V1c0-.6-.4-1-1-1S7 .4 7 1v6H1c-.6 0-1 .4-1 1s.4 1 1 1h6v6c0 .6.4 1 1 1s1-.4 1-1V9h6c.6 0 1-.4 1-1s-.4-1-1-1z" />
                    </svg>
                    <span class="hidden xs:block ml-2"><?= $this->updateMode ? 'Update Notification' : 'Add Notification' ?></span>
                </button>
               </div>

                </div>
                   
                </div>

            </div>

        </div>

    </div>