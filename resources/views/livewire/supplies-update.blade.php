<div class="w-full relative mt-4 shadow-2xl rounded my-24 overflow-hidden" style="margin:0 auto;">
    <div class="grid grid-cols-12 bg-white ">
        <div class="col-span-12 md:border-solid md:border-l md:border-black md:border-opacity-25 h-full pb-12 md:col-span-10">
          <div class="px-4 pt-4  content-center">
            <form  method="POST" class="w-full" wire:submit.prevent="submitForm">
                <fieldset>

                @csrf
                @if(auth()->user()->position != "procurement")
                <legend>Upload Quotations</legend>
                <div class="py-3">
                    @error('quote')
                        <p class="text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                    <label>Upload Quotations</label>
                    <input wire:model="quote" class="w-full px-5 py-3 border border-gray-400 rounded-lg outline-none focus:shadow-outline" type="file"  name="quote" value="{{ old('quote') }}" />

                </div>
                @endif
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
