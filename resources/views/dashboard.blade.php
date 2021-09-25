<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div x-data="{first: 0 , second: 0}">
            </div>

        </div>
    </div>
   
    <div class="py-12 ">
        <div class="w-full mx-auto sm:px-6 lg:px-8">

            <div x-data="game()" class="bg-white w-full min-h-screen overflow-hidden shadow-xl sm:rounded-lg flex items-center jusitfy-center">
                <h1 class="fixed top-0 right-0 p-10 font bold text-3-xl" x-text="points"></h1>
                <div class="grid grid-cols-4 felx-1 gap-10 w-full">
                <template x-for="card in cards">
                    <div >
                        <button class="h-32 w-full cursor-pointer"  :style="'background: ' + (card.flipped ? card.color : '#999')"
                        @click="flipCard(card)"
                        x-show="! card.cleared"></button>
                </div>
               </template>
              </div>
                
            </div>
           
        </div>
       
    </div>
    
</x-app-layout>
<script>
    function pause(miliseconds = 1000){
        return new Promise(resolve => setTimeout(resolve, miliseconds));
    };
    function game(){
        return{
            cards: [
                { color: 'green', flipped: false, cleared: false},
                { color: 'blue', flipped: false, cleared: false},
                { color: 'yellow', flipped: false, cleared: false},
                { color: 'red', flipped: false, cleared: false},
                { color: 'green', flipped: false, cleared: false},
                { color: 'blue', flipped: false, cleared: false},
                { color: 'yellow', flipped: false, cleared: false},
                { color: 'red', flipped: false, cleared: false}
            ],

            get flippedCards(){
                return this.cards.filter(card => card.flipped);
            },

            get clearedCards(){
                return this.cards.filter(card => card.cleared);
            },

            get points(){
                return this.clearedCards.length;
            },

            get remainingCards(){
                return this.cards.filter(card => ! card.cleared);
            },
            
           async flipCard(card){
                card.flipped = ! card.flipped;
                if(this.flippedCards.length === 2){
                   if(this.hasMatch()){

                       await pause();

                       this.flippedCards.forEach(card => card.cleared = true);

                       if(! this.remainingCards.length){
                           alert('you won');
                       }
                   }
                    await pause();

                    this.flippedCards.forEach(card => card.flipped = false);
                }
            },

            hasMatch(){
               return this.flippedCards[0]['color'] === this.flippedCards[1]['color']
            }
        };
    }

    
</script>
