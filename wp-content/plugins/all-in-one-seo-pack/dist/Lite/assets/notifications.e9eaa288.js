import{_ as s}from"./js/_plugin-vue_export-helper.b97bdf23.js";import{c as a,t as r,i as c,f as l,o as p,G as u}from"./js/vue.runtime.esm-bundler.b39e1078.js";import{l as f}from"./js/links.6d4c0bdb.js";import{t as m}from"./js/translations.6e7b2383.js";import"./js/default-i18n.3881921e.js";import"./js/isArrayLikeObject.10b615a9.js";const d={data(){return{interval:null,display:!1,strings:{newNotifications:this.$t.__("You have new notifications!",this.$td)}}},methods:{showNotificationsPopup(){if(this.interval&&window.aioseoNotifications&&parseInt(window.aioseoNotifications.newNotifications)){this.display=!0;const o=document.querySelector("#wp-admin-bar-aioseo-main");o&&o.classList.add("new-notifications")}},hideNotificationsPopup(){this.interval=null,setTimeout(()=>{this.display=!1;const o=document.querySelector("#wp-admin-bar-aioseo-main");o&&o.classList.remove("new-notifications")},500)}},created(){this.interval=setInterval(this.showNotificationsPopup,500),this.showNotificationsPopup(),setTimeout(()=>{this.interval=null,this.display=!1},5e3)}};function _(o,i,y,N,e,t){return e.display?(p(),a("div",{key:0,onClick:i[0]||(i[0]=c((...n)=>t.hideNotificationsPopup&&t.hideNotificationsPopup(...n),["stop"])),onMouseover:i[1]||(i[1]=(...n)=>t.hideNotificationsPopup&&t.hideNotificationsPopup(...n)),class:"aioseo-menu-new-notifications"},r(e.strings.newNotifications),33)):l("",!0)}const w=s(d,[["render",_]]),h=document.querySelector("#aioseo-menu-new-notifications");if(h){const o=u({...w,name:"Standalone/Notifications"});f(o),o.config.globalProperties.$t=m,o.config.globalProperties.$td="all-in-one-seo-pack",o.config.globalProperties.$tdPro="aioseo-pro",o.mount("#aioseo-menu-new-notifications")}
