const generalContxtMenu = document.querySelector('.contxt-general');
const componentContxtMenu = document.querySelector('.contxt-component');
const container = document.querySelector('.container-wrapper');
const componentsContainer=document.querySelector('.main-container');
var isGeneralContextVisible = false;
var isComponentContextVisible = false;


const toggleGeneralMenu = status => {
  generalContxtMenu.style.display = status === 'show' ? 'block' : 'none';
  isGeneralContextVisible = !isGeneralContextVisible;
};
const toggleComponentMenu = status => {
  componentContxtMenu.style.display = status === 'show' ? 'block' : 'none';
  isComponentContextVisible = !isComponentContextVisible;
};

const setPosition = (context, { top, left }) => {
  context.style.left = left + 'px';
  context.style.top = top + 'px';
  context.style.opacity = '1';
  
};

container.addEventListener('click', event => {
  if (isGeneralContextVisible) {
    toggleGeneralMenu('none');
    generalContxtMenu.style.opacity = '0';
  }
  if(isComponentContextVisible)
  {
    toggleComponentMenu('none');
    componentContxtMenu.style.opacity='0';
  }
});

container.addEventListener('contextmenu', event => {
  event.preventDefault();
  if(!isGeneralContextVisible)
  {
    if(!isComponentContextVisible)
    {  
      toggleGeneralMenu('show');
      setPosition(generalContxtMenu, { top: event.pageY, left: event.pageX });
    }
  }
  return false;
});
componentsContainer.addEventListener('contextmenu',event=>{
    event.preventDefault();
    if(!isComponentContextVisible)
    {
      if(!isGeneralContextVisible)
      {
        toggleComponentMenu('show');
        setPosition(componentContxtMenu,{top:event.pageY,left:event.pageX});
        console.log(event.pageX+' '+event.pageY);
      }
    }
    return false;
});