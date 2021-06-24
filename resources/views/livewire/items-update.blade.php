<div class="w-full relative mt-4 shadow-2xl rounded my-24 overflow-hidden" style="margin:0 auto;">
    <div class="grid grid-cols-12 bg-white ">
        <div class="col-span-12 md:border-solid md:border-l md:border-black md:border-opacity-25 h-full pb-12 md:col-span-10">
          <div class="px-4 pt-4  content-center">
            <form  method="POST" class="w-full" wire:submit.prevent="updateForm">
                <fieldset>
                    <legend>Assign Items purchase</legend>
                @csrf
                @if(auth()->user()->position == "procurement")
                <div class="py-3">
                    @error('expected_date')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                    <label>Expected Date of Delivery</label>
                    <input wire:model="expected_date" class="w-full px-5 py-3 border border-gray-400 rounded-lg outline-none focus:shadow-outline" type="date" placeholder="Expected Date of Delivery" name="expected_date" value="{{ old('expected_date') }}" />

                </div>
@endif
                <div class="py-3">
                    <label for="status">Status</label>
                    @error('status')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                    <select wire:model="status" class="w-full px-5 py-3 border border-gray-400 rounded-lg outline-none focus:shadow-outline" type="text" placeholder="line_manager" name="status" value="{{ old('status') }}" />
                    @foreach($allStatus as $key => $value)
                        <option value="{{ $key }}">{{$value}}</option>
                        @endforeach
                </select>
                </div>
                 @if(auth()->user()->position == "procurement")
                <div class="py-3">
                    <label for="vendor_id">Assign to Vendor</label>
                    @error('vendor_id')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                    <select wire:model="vendor_id" class="w-full px-5 py-3 border border-gray-400 rounded-lg outline-none focus:shadow-outline" type="text" placeholder="vendor_id" name="vendor_id" value="{{ old('vendor_id') }}" />
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{$user->name}}</option>
                        @endforeach
                </select>
                </div>
                @endif


                </div>
                <div class="pt-3">
                    <button class="flex px-6 py-3 text-white bg-indigo-500 rounded-md hover:bg-indigo-600 hover:text-white focus:outline-none focus:shadow-outline focus:border-indigo-300" type="submit">
                        <span class="self-center float-left ml-3 text-base font-medium">Submit</span>
                    </button>
                </div>
                </fieldset>
            </form>
          </div>
        </div>


    </div>
</div>
