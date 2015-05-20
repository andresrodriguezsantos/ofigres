jQuery(document).ready(function($) {
	var bg = $('.bgl');
    var InfiniteRotator =
    {
        init: function()
        {
            var items = [
                'url(http://demoofigres.260mb.net/web/theme/images/p2.jpg)',
                'url(http://demoofigres.260mb.net/web/theme/images/p1.jpg)'
            ];
            //count number of items
            var numberOfItems = 2;
            //set current item
            var currentItem = 0;
            //loop through the items
            var infiniteLoop = setInterval(function(){
                bg.css({
                    'background-image': items[currentItem]
                });
                if(currentItem == numberOfItems -1){
                    currentItem = 0;
                }else{
                    currentItem++;
                }
            }, 5000);
        }
    };
    InfiniteRotator.init();
});