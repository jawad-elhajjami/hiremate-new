<button wire:loading.attr="disabled" wire:click="toggleLikePost" class="cursor-pointer flex flex-row items-center justify-between p-2 hover:bg-[#f5f5f5] rounded-md">
    
    <svg wire:loading.delay aria-hidden="true" class="w-6 h-6 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="#4DD783"/></svg>

    <svg wire:loading.delay.remove xmlns="http://www.w3.org/2000/svg" width="26" height="24" viewBox="0 0 26 24" fill="{{ Auth::user()->hasLiked($post) ? '#4DD783' : 'none' }}">
        <path d="M2.79452 13.3699L12.3219 22.1601C12.6437 22.457 12.8046 22.6054 13 22.6054C13.1954 22.6054 13.3563 22.457 13.6781 22.1601L23.2055 13.3699C25.9108 10.874 26.2379 6.71586 23.9562 3.82755L23.6008 3.37759C20.9037 -0.0365739 15.5651 0.542922 13.6634 4.45627C13.3944 5.00988 12.6056 5.00987 12.3366 4.45627C10.4349 0.542921 5.09629 -0.0365701 2.39921 3.37759L2.04375 3.82756C-0.23792 6.71586 0.0892327 10.874 2.79452 13.3699Z" stroke="{{ Auth::user()->hasLiked($post) ? '#4DD783' : '#888' }}"/>
    </svg>
    <span class="ml-2 text-[#888] font-bold">
        @if($post->likes()->count() == 0) Like
        @elseif($post->likes()->count() == 1) {{$post->likes()->count() }} Like
        @else {{$post->likes()->count() }} Likes
        @endif
    </span>
</button>