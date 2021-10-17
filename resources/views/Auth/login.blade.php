<x-layout>

    <section class="px-6 py-2">
        <main class="bg-gray-100 p-6 border border-gray-200 mx-auto max-w-lg mt-10 rounded-xl">
            <h2 class="text-center mt-5 font-bold text-xl">Login</h2>
            <form action="/login" method="post" class="mt-10 ">
                @csrf

                <div class="mb-6">
                    <label for="email" class=" block mb-2 text-xs text-gray-700 uppercase">Email</label>
                    <input type="email" value='{{old('email')}}' name="email" class="border rounded-xl border-gray-400 p-2 w-full "/>
                    @error('email')
                    <p class="text-red-500 text-sm mt-1" >
                        {{$message}}
                    </p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class=" block mb-2 text-xs text-gray-700 uppercase">Password</label>
                    <input type="password"  name="password" class="border rounded-xl border-gray-400 p-2 w-full "/>
                    @error('password')
                    <p class="text-red-500 text-sm mt-1" >
                        {{$message}}
                    </p>
                    @enderror
                </div>

                <button type="submit" class="bg-gray-400 py-2 px-4 rounded-xl text-white hover:bg-gray-700">Login</button>
            </form>


        </main>
        <br>

    </section>
</x-layout>
