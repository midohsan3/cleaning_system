SEMICOLON.Core.getVars.fn.quantity=e=>{const t=SEMICOLON.Core;if(t.initFunction({class:"has-plugin-quantity",event:"pluginQuantityReady"}),(e=t.getSelector(e,!1)).length<1)return!0;e.forEach(e=>{let t=e.querySelector(".plus"),u=e.querySelector(".minus"),a=e.querySelector(".qty");const l=new Event("change");t.onclick=e=>{var t=a.value,u=a.getAttribute("step")||1,r=a.getAttribute("max");if(r&&Number(elValue)>=Number(r))return!1;/^\d+$/.test(t)?(t=Number(t)+Number(u),a.value=t):a.value=Number(u),a.dispatchEvent(l),e.preventDefault()},u.onclick=e=>{let t=a.value,u=a.getAttribute("step")||1,r=a.getAttribute("min");var n;(!r||r<0)&&(r=1),/^\d+$/.test(t)?Number(t)>Number(r)&&(n=Number(t)-Number(u),a.value=n):a.value=Number(u),a.dispatchEvent(l),e.preventDefault()}})};