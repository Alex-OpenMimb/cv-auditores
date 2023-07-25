
export const expRMail = /^[a-z0-9]+(\.[_a-z0-9]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,15})$/;

const d = document;

const $name =  d.getElementById('input-name-contact');
const $company =  d.getElementById('input-company-contact');
const $email =  d.getElementById('input-email-contact');
const $phone =  d.getElementById('input-phone-contact');
const $city =  d.getElementById('input-city-contact');
const $message =  d.getElementById('input-message-contact');
const $check =  d.getElementById('input-check-contact');



let stateBtn = {
    name:false,
    company:false,
    email:false,
    phone:false,
    city:false,
    message:false
};

export const validateFormContact = () => {

    d.addEventListener('click',(e)=>{
        if(e.target.matches('#contact-form')){
            

          
        }
    })
};



export function validateInputEmpty(input,msm,text,btn){

    let value = input.value;

    if(!value || value === " "){
        msm.textContent = text;
        stateBtn.btn = false;
    }else{
        msm.textContent = '';
        stateBtn.btn = true;
    }
};

export function validateEmailUser(input,msm){

    let value = input.value;

    if(value === ' '){
        msm.textContent = 'No has ingresado un correo valido';
        stateBtn.btn = false;
    }else if(!expRMail.test(value)){
        msm.textContent = 'No has ingresado un correo valido';
        stateBtn.btn = false;
    }else{
        msm.textContent = '';
        stateBtn.btn = true;
    }
};