<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">

            <thead class="bg-gray-50">
              <tr>
                  <th> id</th>
                  <th> name </th>
                  <th> email </th>
                  <th> line manager </th>
                  <th> Department </th>
                  <th> position </th>
                  <th>Type </th>
                  <th colspan="2">Actions</th>

              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @if(count($data))
                @foreach ($data as $item )
                <tr>
                    <td>{{ $loop->index+1 }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td> {{ $item['email'] }} </td>
                    <?php
                    $line_manager =\App\Models\User::where('id',$item['line_manager'])->first();
                    $department = \App\Models\Department::where('id',$item['department_id'])->first();
                    $index =$loop->index;
                     ?>
                    <td> {{ !is_null($line_manager) ? $line_manager->name:""}}</td>
                    <td> {{ !is_null($department) ? $department->name:""}}</td>
                    <td>{{ $item['position'] }}</td>
                    <td>{{ $item['type'] }}</td>
                    <td>
                      <a href ="{{ route('user_update', $item['id']) }}">Update </a>
                    </td>

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
