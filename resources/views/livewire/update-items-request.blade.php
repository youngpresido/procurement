<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">

            <thead class="bg-gray-50">
              <tr>
                  @foreach ($headers as $key => $value)

                  <th style="cursor: pointer;" wire:click="sort({{ $key }})" scope="col" class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase ">
                    {{ is_array($value)? $value['label']: $value }}
                     </th>
                  @endforeach
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @if(count($data))
                @foreach ($data as $item )

                <tr>
                    @foreach($headers as $key => $value)
                    <td class="px-2 py-3 whitespace-nowrap text-sm text-gray-500">
                        @if($key=='action')
                        <a href="{{ url('/admin/item/'.$item['id']) }}">view</a>
                        @else
                            {!! is_array($value)? $value['func']($item[$key]): $item[$key] !!}
                        @endif

                       </td>

                    @endforeach
                  </tr>
                @endforeach

              @endif

              <!-- More people... -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
