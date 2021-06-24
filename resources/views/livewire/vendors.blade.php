
    <div>
        <section class="relative py-6 bg-white bg-gray-200 min-w-screen animation-fade animation-delay">
            <div class="container h-full max-w-5xl mx-auto overflow-hidden rounded-lg shadow">
                @if ($successMsg)
                    <div class="inline-flex w-full ml-3 overflow-hidden bg-white rounded-lg shadow-sm">
                        <div class="flex items-center justify-center w-12 bg-green-500">
                        </div>
                        <div class="px-3 py-2 text-left">
                            <span class="font-semibold text-green-500">Success</span>
                            <p class="mb-1 text-sm leading-none text-gray-500">{{ $successMsg }}</p>
                        </div>
                    </div>
                @endif
                <div class="h-full sm:flex">

                    <div class="flex items-center justify-center w-full p-10 bg-white">


                        <form  method="POST" class="w-full" wire:submit.prevent="submitForm">
                            <fieldset>
                                <legend>Vendor Application</legend>
                            @csrf
                            <div class="py-3">
                                @error('organisation_name')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                                <input wire:model="organisation_name" class="w-full px-5 py-3 border border-gray-400 rounded-lg outline-none focus:shadow-outline" type="text" placeholder="Organisation Name" name="organisation_name" value="{{ old('organisation_name') }}" />
                            </div>
                            <div class="py-3">
                                @error('organisation_address')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                                <input wire:model="organisation_address" class="w-full px-5 py-3 border border-gray-400 rounded-lg outline-none focus:shadow-outline" type="text" placeholder="Organisation Address" name="organisation_address" value="{{ old('organisation_address') }}" />
                            </div>
                            <div class="py-3">
                                @error('organisation_email')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                                <input wire:model="organisation_email" class="w-full px-5 py-3 border border-gray-400 rounded-lg outline-none focus:shadow-outline" type="text" placeholder="Organisation Email" name="organisation_email" value="{{ old('organisation_email') }}" />
                            </div>
                            <div class="py-3">
                                @error('website')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                                <input wire:model="website" class="w-full px-5 py-3 border border-gray-400 rounded-lg outline-none focus:shadow-outline" type="text" placeholder="Organisation Website Address" name="website" value="{{ old('organisation_website') }}" />
                            </div>
                            <div class="py-3">
                                @error('contact_name')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                                <input wire:model="contact_name" class="w-full px-5 py-3 border border-gray-400 rounded-lg outline-none focus:shadow-outline" type="text" placeholder="Contact Name" name="contact_name" value="{{ old('contact_name') }}" />
                            </div>
                            <div class="py-3">
                                @error('contact_email')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                                <input wire:model="contact_email" class="w-full px-5 py-3 border border-gray-400 rounded-lg outline-none focus:shadow-outline" type="email" placeholder="Contact Email" name="contact_email" value="{{ old('contact_email') }}" />
                            </div>
                            <div class="py-3">
                                @error('contact_phone')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                                <input wire:model="contact_phone" class="w-full px-5 py-3 border border-gray-400 rounded-lg outline-none focus:shadow-outline" type="text" placeholder="Contact Phone" name="contact_phone" value="{{ old('contact_phone') }}" />
                            </div>
                            <div class="py-3">
                                @error('supply')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                                <input wire:model="supply" class="w-full px-5 py-3 border border-gray-400 rounded-lg outline-none focus:shadow-outline" type="text" placeholder="Supplies" name="supply" value="{{ old('supply') }}" />
                                <small>List supplies seperated with comma </small>
                            </div>
                            <div class="py-3">
                                @error('quotation')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                                <label>Quotation: </label>
                                <input wire:model="quotation" class="w-full px-5 py-3 border border-gray-400 rounded-lg outline-none focus:shadow-outline" type="file" placeholder="Supplies" name="quotation"  />

                            </div>
                            <div class="py-3">
                                @error('logo')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                                <label>Logo: </label>
                                <input wire:model="logo" class="w-full px-5 py-3 border border-gray-400 rounded-lg outline-none focus:shadow-outline" type="file" placeholder="Supplies" name="logo"  />

                            </div>

                            <div class="py-3">
                                @error('invoice')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                                <label>Invoice: </label>
                                <input wire:model="invoice" class="w-full px-5 py-3 border border-gray-400 rounded-lg outline-none focus:shadow-outline" type="file" placeholder="Supplies" name="invoice"  />

                            </div>

                            <div class="py-3">
                                @error('signature')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                                <label>Signature: </label>
                                <input wire:model="signature" class="w-full px-5 py-3 border border-gray-400 rounded-lg outline-none focus:shadow-outline" type="file" placeholder="Supplies" name="signature"  />

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
        </section>
    </div>
