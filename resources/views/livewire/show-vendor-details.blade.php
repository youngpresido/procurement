<div class="w-full relative mt-4 shadow-2xl rounded my-24 overflow-hidden">

    <div class="grid grid-cols-12 bg-white ">



      <div class="col-span-12 md:border-solid md:border-l md:border-black md:border-opacity-25 h-full pb-12 md:col-span-10">
        <div class="px-4 pt-4">
          <form wire:submit.prevent="updateStatus" class="flex flex-col space-y-8">

            <div>
              <h3 class="text-2xl font-semibold">Basic Information</h3>
              <hr>
            </div>

            <div class="form-item">
              <label class="text-xl ">Company Name</label>
              <input type="text" value="{{ $data['organisation_name'] }}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200" disabled>
            </div>

            {{-- <div class="flex flex-col space-y-4 md:space-y-0 md:flex-row md:space-x-4"> --}}

              <div class="form-item w-full">
                <label class="text-xl ">Company Address</label>
                <input type="text" value="{{ $data['organisation_address'] }}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>
              </div>

              <div class="form-item w-full">
                <label class="text-xl ">Email</label>
                <input type="text" value="{{ $data['organisation_email'] }}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>
              </div>
              <div class="form-item w-full">
                <label class="text-xl ">Website</label>
                <input type="text" value="{{ $data['website'] }}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>
                <a href="{{ $data['website'] }}" _target="_blank">Visit Website</a>
              </div>
              <div class="form-item w-full">
                <label class="text-xl ">Supply</label>
                <input type="text" value="{{ $data['supply'] }}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>

              </div>
            {{-- </div> --}}





            <div>
              <h3 class="text-2xl font-semibold">Contacts Details</h3>
              <hr>
            </div>

            <div class="form-item">
              <label class="text-xl ">Name</label>
              <input type="text" value="{{ $data['contact_name'] }}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>
            </div>
            <div class="form-item">
              <label class="text-xl ">Email</label>
              <input type="text" value="{{ $data['contact_email'] }}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2 mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200 text-opacity-25 " disabled>
            </div>
            <div class="form-item">
              <label class="text-xl ">Phone</label>
              <input type="text" value="{{ $data['contact_phone'] }}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200  " disabled>
            </div>

            <div>
                <h3 class="text-2xl font-semibold">Documents</h3>
                <hr>
              </div>

              <div class="form-item">
                <label class="text-xl ">Logo</label>
                <a href="{{asset('saved/photos/'.$data['logo']) }}" target="_blank">View logo</a>
              </div>
              <div class="form-item">
                <label class="text-xl ">Invoice</label>
                <a href="{{asset('saved/photos/'.$data['invoice']) }}" target="_blank">View Invoice</a>
              </div>
              <div class="form-item">
                <label class="text-xl ">Quotation</label>
                <a href="{{asset('saved/photos/'.$data['quotation']) }}" target="_blank">View Quotation</a>
              </div>
              <div class="form-item">
                <label class="text-xl ">Signature</label>
                <a href="{{asset('saved/photos/'.$data['signature']) }}" target="_blank">View Signature</a>
              </div>
              <div class="form-item">
                <label class="text-xl ">Status </label>
                <input type="text" value="{{ $data['status'] }}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200  " disabled>
              </div>


              <div class="form-item">

                  @if($showUpdate=="false")


                  <input type="button" value=" Update Status" wire:click="openModal()" class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded text-white focus:outline-none">


                @endif
                @if($showUpdate=="true")
                <div class="mb-4">

                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                        Status
                      </label>
                      <div class="relative">
                        <select wire:model="status" name="status" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                            @foreach($allStatus as $key => $value)
                          <option value="{{ $key }}">{{$value}}</option>
                          @endforeach
                        </select>
                      </div>
                      @if($status =='rejected')
                      <div class="form-item">
                        <label class="text-xl ">Reason</label>
                        <input type="text" wire:model="reason" value="{{ $data['reason'] }}" class="w-full appearance-none text-black text-opacity-50 rounded shadow py-1 px-2  mr-2 focus:outline-none focus:shadow-outline focus:border-blue-200  " disabled>
                      </div>
                      @endif

                  </div>
                <input type="submit" value="submit" class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded text-white focus:outline-none"/>
                <input type="button" value="cancel update" wire:click="removeModal()" class="bg-green-500 hover:bg-green-600 px-4 py-2 rounded text-white focus:outline-none">
                @endif

              </div>
          </form>
        </div>
      </div>


    </div>
  </div>



  {{-- modal --}}


    <script>
    const modal_overlay = document.querySelector('#modal_overlay');
    const modal = document.querySelector('#modal');

    function openModal (value){
        const modalCl = modal.classList
        const overlayCl = modal_overlay

        if(value){
        overlayCl.classList.remove('hidden')
        setTimeout(() => {
            modalCl.remove('opacity-0')
            modalCl.remove('-translate-y-full')
            modalCl.remove('scale-150')
        }, 100);
        } else {
        modalCl.add('-translate-y-full')
        setTimeout(() => {
            modalCl.add('opacity-0')
            modalCl.add('scale-150')
        }, 100);
        setTimeout(() => overlayCl.classList.add('hidden'), 300);
        }
    }

    </script>
