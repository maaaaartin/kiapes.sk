document.addEventListener('DOMContentLoaded',()=>{
 const list=document.querySelector('[data-block-list]');
 const form=document.querySelector('[data-block-form]');
 const typeSelect=document.querySelector('[data-block-type]');
 if(typeSelect&&form){const update=()=>{const t=typeSelect.value;form.querySelectorAll('[data-field]').forEach(f=>{f.hidden=f.dataset.field!==t;});};typeSelect.addEventListener('change',update);update();}
 if(!list)return;let dragged=null;
 list.querySelectorAll('[data-block-id]').forEach(item=>{item.draggable=true;
  item.addEventListener('dragstart',()=>{dragged=item;item.classList.add('dragging');});
  item.addEventListener('dragend',()=>{item.classList.remove('dragging');saveOrder();});
  item.addEventListener('dragover',e=>{e.preventDefault();const after=getAfter(list,e.clientY);if(after==null)list.appendChild(dragged);else list.insertBefore(dragged,after);});});
 function getAfter(c,y){return [...c.querySelectorAll('[data-block-id]:not(.dragging)')].reduce((cl,ch)=>{const b=ch.getBoundingClientRect();const o=y-b.top-b.height/2;if(o<0&&o>cl.offset)return{offset:o,element:ch};return cl;},{offset:Number.NEGATIVE_INFINITY,element:null}).element;}
 function saveOrder(){const order=[...list.querySelectorAll('[data-block-id]')].map(i=>i.dataset.blockId);fetch('/admin?action=blocks&page_id='+list.dataset.pageId+'&do=reorder',{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-Token':document.querySelector('[name="_csrf"]').value},body:JSON.stringify({order})});}
});
