import"./js/_plugin-vue_export-helper.b97bdf23.js";import{G as f,y as g}from"./js/vue.runtime.esm-bundler.b39e1078.js";import{c as h,a as y}from"./js/vue-router.2e9fe287.js";import{e as k,l as E}from"./js/index.ce510b7e.js";import{l as b}from"./js/index.0eabb636.js";import{l as v}from"./js/index.0b123ab1.js";import{i as S,j as _,l as $}from"./js/links.6d4c0bdb.js";import{g as A,m as c,T as I}from"./js/postContent.37ac0296.js";import{i as C}from"./js/isEqual.585d298d.js";import{i as P}from"./js/isEmpty.9b8981f6.js";import{s as r,_ as n}from"./js/default-i18n.3881921e.js";import{A as s}from"./js/App.dcb2eb51.js";import"./js/translations.6e7b2383.js";import"./js/constants.1758f66e.js";import"./js/Caret.164d8058.js";import"./js/isArrayLikeObject.10b615a9.js";import"./js/cleanForSlug.a67f7e84.js";import"./js/_stringToArray.a4422725.js";import"./js/_baseIsEqual.640c1807.js";import"./js/_getAllKeys.4291a623.js";import"./js/_getTag.4ca3d6f0.js";/* empty css                */import"./js/allowed.487e325b.js";import"./js/params.f0608262.js";/* empty css                                               *//* empty css                                                 */import"./js/JsonValues.870a4901.js";import"./js/TruSeoHighlighter.3c8290a7.js";import"./js/Ellipse.f3d45202.js";import"./js/toFinite.c2274946.js";/* empty css                                                 */import"./js/SettingsRow.1adac8e2.js";import"./js/Row.5242dafa.js";import"./js/Checkbox.17c05fc5.js";import"./js/Checkmark.e0bb6305.js";import"./js/LicenseKeyBar.d79b3571.js";import"./js/LogoGear.c42c709f.js";import"./js/Tabs.2d98f126.js";import"./js/TruSeoScore.29220195.js";import"./js/SaveChanges.64df9080.js";import"./js/Information.70c6532e.js";import"./js/Slide.cdf6c622.js";import"./js/Portal.6c1bcf12.js";import"./js/Index.4ee78e0e.js";import"./js/MaxCounts.12b45bab.js";import"./js/Tags.993eb9a7.js";import"./js/tags.8f5c2702.js";import"./js/Tooltip.6979830f.js";import"./js/Plus.3a43a085.js";import"./js/Eye.17b73ba3.js";import"./js/Editor.34e7b5eb.js";import"./js/Blur.8cc39c73.js";import"./js/RadioToggle.334ba6b1.js";import"./js/GoogleSearchPreview.e8c93b1b.js";import"./js/HtmlTagsEditor.acf1755b.js";import"./js/UnfilteredHtml.c2f2a37a.js";import"./js/popup.6fe74774.js";import"./js/addons.34d5dad4.js";import"./js/upperFirst.d65414ba.js";import"./js/Index.f7bbb33f.js";import"./js/WpTable.42b00300.js";import"./js/Table.1ce53c08.js";import"./js/numbers.c7cb4085.js";import"./js/PostTypes.9ab32454.js";import"./js/InternalOutbound.4ce419f7.js";import"./js/RequiredPlans.fd5cb1f6.js";import"./js/license.188ce8ae.js";import"./js/Image.74b2d3c5.js";import"./js/FacebookPreview.e4d39921.js";import"./js/Img.57b2833c.js";import"./js/Profile.066f7adf.js";import"./js/ImageUploader.0dab3221.js";import"./js/TwitterPreview.b36cbba8.js";import"./js/Book.b195937b.js";import"./js/Settings.8ba385ff.js";import"./js/Build.971e396e.js";import"./js/Redirects.800c53f7.js";import"./js/Index.81946320.js";import"./js/strings.01407ca7.js";import"./js/isString.395b35ce.js";import"./js/ProBadge.34da75c2.js";import"./js/External.8186427a.js";import"./js/Exclamation.2f8bed1f.js";import"./js/Gear.a85d4a2b.js";import"./js/Card.9b0c1a15.js";import"./js/Upsell.088229d5.js";class D extends window.$e.modules.hookUI.Base{constructor(o,i,t){super(),this.hook=o,this.id=i,this.callback=t}getCommand(){return this.hook}getId(){return this.id}apply(){return this.callback()}}class O extends window.$e.modules.hookData.Base{constructor(o,i,t){super(),this.hook=o,this.id=i,this.callback=t}getCommand(){return this.hook}getId(){return this.id}apply(){return this.callback()}}function a(e,o,i){window.$e.hooks.registerUIAfter(new D(e,o,i))}function x(e,o,i){window.$e.hooks.registerDataAfter(new O(e,o,i))}let m={},p=!1;const l=()=>{const e=window.elementor.documents.getCurrent();if(!["wp-post","wp-page"].includes(e.config.type))return;const o={...m},i=A();C(o,i)||(m=i,c())},B=()=>{const e=S();P(e.currentPost)||window.elementor.config.document.id===window.elementor.config.document.revisions.current_id&&e.saveCurrentPost(e.currentPost).then(()=>{_().fetch()})},U=()=>{window.$e.internal("document/save/set-is-modified",{status:!0})},H=()=>{p||(p=!0,a("editor/documents/attach-preview","aioseo-content-scraper-attach-preview",l),a("document/save/set-is-modified","aioseo-content-scraper-on-modified",l),x("document/save/save","aioseo-save",B),k.on("postSettingsUpdated",U))},L=()=>{if(window.elementor.config.user.introduction["aioseo-introduction"]===!0)return;const e=new window.elementorModules.editor.utils.Introduction({introductionKey:"aioseo-introduction",dialogType:"alert",dialogOptions:{id:"aioseo-introduction",headerMessage:r(n("New: %1$s %2$s integration","all-in-one-seo-pack"),"AIOSEO","Elementor"),message:r(n("You can now manage your SEO settings inside of %1$s via %2$s before you publish your post!","all-in-one-seo-pack"),"Elementor","All in One SEO"),position:{my:"center center",at:"center center"},strings:{confirm:n("Got It!","all-in-one-seo-pack")},hide:{onButtonClick:!1},onConfirm:()=>{e.setViewed(),e.getDialog().hide()}}});e.show()},T=()=>{let e=window.elementor.getPreferences("ui_theme")||"auto";e==="auto"&&(e=matchMedia("(prefers-color-scheme: dark)").matches?"dark":"light"),document.body.classList.forEach(o=>{o.startsWith("aioseo-elementor-")&&document.body.classList.remove(o)}),document.body.classList.add("aioseo-elementor-"+e)},M=()=>{window.$e.routes.on("run:after",function(e,o){T(),o==="panel/page-settings/aioseo"&&d("#elementor-panel-page-settings-controls")}),window.elementor.modules.layouts.panel.pages.menu.Menu.addItem({name:"aioseo",icon:"aioseo aioseo-element-menu-icon aioseo-element-menu-icon-"+window.elementor.getPreferences("ui_theme"),title:"All in One SEO",type:"page",callback:()=>{try{window.$e.routes.run("panel/page-settings/aioseo")}catch{window.$e.routes.run("panel/page-settings/settings"),window.$e.routes.run("panel/page-settings/aioseo")}}},"more"),window.elementor.once("preview:loaded",function(){window.$e.components.get("panel/elements").addTab("aioseo",{title:"AIOSEO"})}),window.elementor.hooks.addFilter("panel/elements/regionViews",e=>(e.aioseo={region:e.global.region,view:window.Marionette.ItemView.extend({template:!1,id:"elementor-panel-aioseo",className:"aioseo-elementor aioseo-sidebar-panel",initialize(){document.getElementById("elementor-panel-elements-search-area").hidden=!0},onShow(){d("#elementor-panel-aioseo")},onDestroy(){document.getElementById("elementor-panel-elements-search-area").hidden=!1}}),options:{}},e))},d=e=>{const o=document.querySelector(e);o.classList.add("edit-post-sidebar","aioseo-elementor-panel"),o.appendChild(document.createElement("div"));const i=h({history:y(),routes:[{path:"/",component:s}]});let t=f({name:"Standalone/Elementor",data(){return{tableContext:window.aioseo.currentPost.context,screenContext:"sidebar"}},render:()=>g(s)});t=E(t),t=b(t),t=v(t),t.use(i),i.app=t,$(t,i),H(),t.config.globalProperties.$truSeo=new I,t.mount(`${e} > div`),c()},u=()=>{M(),L()};let w=!1;window.elementor&&(setTimeout(u),w=!0);(function(e){w||e(window).on("elementor:init",()=>{window.elementor.on("panel:init",()=>{setTimeout(u)})})})(window.jQuery);