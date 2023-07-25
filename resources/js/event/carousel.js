
const d = document;
const $btnPrevent = d.getElementById('button-prev') === null ? 'data': d.getElementById('button-prev'),
$btnNext = d.getElementById('button-next') === null ? 'data': d.getElementById('button-next');


export function carousel(){

    if($btnPrevent === 'data' && $btnNext  === 'data' ){
        return
    }else{
        $btnPrevent.onclick = ()=> move(1);
        $btnNext.onclick = ()=> move(2);
    }
}; 


function move(value){

 const $track = d.getElementById('track'),
$slickList = d.getElementById('slick-list'),
$slick = d.querySelectorAll('.slick'),
slickWidth =  $slick[0].offsetWidth;
    const trackWidth =  $track.offsetWidth;
    const listWidth =   $slickList.offsetWidth;
    let leftPosition;

  
        $track.style.left == ""  ? leftPosition = $track.style.left = 0 : leftPosition = parseFloat($track.style.left.slice(0, -2) * -1);

        if(leftPosition < (trackWidth - listWidth) && value === 2){
            $track.style.left = `${-1 * (leftPosition + slickWidth)}px`;
        }else if(leftPosition > 0 && value === 1){
            $track.style.left = `${-1 * (leftPosition - slickWidth)}px`;
        }
    
 
};

carousel();

