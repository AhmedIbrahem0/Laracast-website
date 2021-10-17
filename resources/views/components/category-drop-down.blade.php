
<div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl  ">
    <div x-data="{show: false}">
        <button class="flex py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left lg:inline-flex" x-on:click="show = ! show">{{isset($currentcategory) ? $currentcategory->name : "Category"}}

            <svg class=" transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22" height="22" viewBox="0 0 22 22">
                <g fill="none" fill-rule="evenodd">
                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                    </path>
                    <path fill="#222"
                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                </g>

            </svg>
        </button>

        <div x-show="show" class="z-50 w-full mt-2 rounded px-2 absolute bg-gray-100 mt-2 w-full rounded-xl" @click.away="show= !show ">
            <a href="/posts" class="block text-left px-2 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500 ">All</a>
            @foreach($categories as $category)
                <a href="posts?category={{$category->slug}}&{{http_build_query(request()->except('category'))}}" class="block text-left px-2 text-sm leading-6 hover:bg-blue-500 focus:bg-blue-500
                       {{ isset($currentcategory) && $currentcategory->id == $category->id ?'bg-blue-500' : '' }}">{{$category->name}}</a>
            @endforeach
        </div>
    </div>

</div>
