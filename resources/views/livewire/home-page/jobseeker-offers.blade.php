<div>
    <div class="m-10 mt-16">
        <nav class="slidemenu md:max-w-[30%] mx-auto overflow-hidden">
            <!-- Item 1 -->
            <input type="radio" name="slideItem" id="slide-item-1" class="slide-toggle hidden" @if(self::$selectedNavSection == 1) checked @endif/>
            <label wire:click="selectNav(1)" for="slide-item-1" class="font-bold select-none w-[30%] text-center block float-left mx-[1.6%] dark:text-gray-300 opacity-20 cursor-pointer">For you</label>
            
            <!-- Item 2 -->
            <input type="radio" name="slideItem" id="slide-item-2" class="slide-toggle hidden" @if(self::$selectedNavSection == 2) checked @endif/>
            <label wire:click="selectNav(2)" for="slide-item-2" class="font-bold select-none w-[30%] text-center block float-left mx-[1.6%] dark:text-gray-300 opacity-20 cursor-pointer">Search</label>
            
            <!-- Item 3 -->
            <input type="radio" name="slideItem" id="slide-item-3" class="slide-toggle hidden" @if(self::$selectedNavSection == 3) checked @endif/>
            <label wire:click="selectNav(3)" for="slide-item-3" class="font-bold select-none w-[30%] text-center block float-left mx-[1.6%] dark:text-gray-300 opacity-20 cursor-pointer">Activity</label>
    
            
            <!-- Bar -->
            <div class="slider w-full h-[3.5px] block bg-transparent mt-[30px] relative">
                <div class="bar w-1/5 h-[3.5px] bg-[var(--color-primary)]"></div>
            </div>
        </nav>
        <hr class="mt-0 mb-[3%] h-[0.5px] bg-gray-300 dark:bg-gray-600 border-none">
    </div>
    <div class="min-h-96">
        @if(self::$selectedNavSection == 1)
            <div wire:loading.class='opacity-50'>
                <livewire:home-page.foryou-offers />
            </div>
        
        @elseif(self::$selectedNavSection == 2)
            <div wire:loading.class='opacity-50'>
                <livewire:home-page.searched-offers />
            </div>
            
        @elseif(self::$selectedNavSection == 3)
            <div wire:loading.class='opacity-50'>
                <livewire:home-page.activity-offers />
            </div>
            
        @endif
    </div>

</div>