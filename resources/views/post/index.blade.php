<x-layout>
<x-postheader ></x-postheader>

  @if($posts->count())
  <x-SpecialArticle :post="$posts[0]"></x-SpecialArticle>
      @if($posts->count()>1)
  <div class="lg:grid lg:grid-cols-6">
  @foreach($posts->skip(1) as $post)

    <x-Card : class='{{$loop->iteration <3 ?"col-span-3":"col-span-2"}}' :post="$post"></x-Card>

  @endforeach

  </div>
            {{$posts->links()}}
  @endif
  @else
  <p class="text-center">No Posts added yet</p>
  @endif
@if(session()->has('success'))
        <div  x-data="{ show: true }"
              x-init=" setTimeout(()=> show=false ,4000) "
              x-show="show"

        >
        <p
            class="bg-blue-500 bottom-5 fixed flex mr-10 px-2 py-2 right-0 rounded-2 text-white w-sm">
            {{ session('success')}}
        </p>
        </div>
    @endif
</x-layout>
