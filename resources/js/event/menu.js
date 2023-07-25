
const d = document,
$menu = d.getElementById('menu__nav');

export function menuHamburguer(){
    
    d.addEventListener("click",(e) => {

        if(e.target.matches('.btn-hamburger *')){

             const  height = $menu.scrollHeight + 180;

            if($menu.classList.contains('expand')){
                $menu.classList.remove('expand');
                $menu.removeAttribute('style'); 
            }else{
                $menu.classList.add('expand');
                $menu.style.height = height + 'px';
            } 
            
        };
    });
};

export function subMenu(){

    d.addEventListener('click', (e)=>{

        if(window.innerWidth < 768){
             
            if(e.target.matches(".menu__link  *")){
                let sibling = e.path[1].nextElementSibling;
    
                if(sibling === null){
                    return
                }else{
                    const  height = sibling.scrollHeight;
                    
                    if(sibling.classList.contains('expand')){
                        sibling.classList.remove('expand');
                        sibling.removeAttribute('style'); 
                    }else{
                        sibling.classList.add('expand');
                        sibling.style.height = height + 'px';
                    }
                }
            
            };

        }

       
    });
};