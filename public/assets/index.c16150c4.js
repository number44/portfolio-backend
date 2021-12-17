var N=Object.defineProperty;var f=Object.getOwnPropertySymbols;var v=Object.prototype.hasOwnProperty,j=Object.prototype.propertyIsEnumerable;var h=(l,t,r)=>t in l?N(l,t,{enumerable:!0,configurable:!0,writable:!0,value:r}):l[t]=r,i=(l,t)=>{for(var r in t||(t={}))v.call(t,r)&&h(l,r,t[r]);if(f)for(var r of f(t))j.call(t,r)&&h(l,r,t[r]);return l};import{j as m,R as p,u as S,r as d,a as L}from"./vendor.5519c724.js";const w=function(){const t=document.createElement("link").relList;if(t&&t.supports&&t.supports("modulepreload"))return;for(const e of document.querySelectorAll('link[rel="modulepreload"]'))a(e);new MutationObserver(e=>{for(const n of e)if(n.type==="childList")for(const s of n.addedNodes)s.tagName==="LINK"&&s.rel==="modulepreload"&&a(s)}).observe(document,{childList:!0,subtree:!0});function r(e){const n={};return e.integrity&&(n.integrity=e.integrity),e.referrerpolicy&&(n.referrerPolicy=e.referrerpolicy),e.crossorigin==="use-credentials"?n.credentials="include":e.crossorigin==="anonymous"?n.credentials="omit":n.credentials="same-origin",n}function a(e){if(e.ep)return;e.ep=!0;const n=r(e);fetch(e.href,n)}};w();const E="modulepreload",x={},O="/",_=function(t,r){return!r||r.length===0?t():Promise.all(r.map(a=>{if(a=`${O}${a}`,a in x)return;x[a]=!0;const e=a.endsWith(".css"),n=e?'[rel="stylesheet"]':"";if(document.querySelector(`link[href="${a}"]${n}`))return;const s=document.createElement("link");if(s.rel=e?"stylesheet":E,e||(s.as="script",s.crossOrigin=""),s.href=a,document.head.appendChild(s),e)return new Promise((u,c)=>{s.addEventListener("load",u),s.addEventListener("error",c)})})).then(()=>t())};const o=m.exports.jsx,g=m.exports.jsxs,D=m.exports.Fragment,P=({})=>o("header",{children:o("nav",{className:"max-6xl mx-auto bg-white shadow-sm w-full h-16 fixed top-0 flax",children:o("div",{className:"brand h-full flex-center",children:"Logo"})})}),R=p.lazy(()=>_(()=>import("./Notes.c21d6bcb.js"),["assets/Notes.c21d6bcb.js","assets/vendor.5519c724.js"])),y="http://localhost:8000/api/notes";function A({}){const{register:l,handleSubmit:t,watch:r,formState:{errors:a}}=S();d.exports.useState(0);const[e,n]=d.exports.useState(null);d.exports.useEffect(()=>{s()},[]);const s=()=>{fetch(y).then(c=>c.json()).then(c=>n(c)).catch(c=>console.log("error :",c))},u=c=>{console.log("data :",c),fetch(y,{method:"post",headers:{Accept:"application/json, text/plain, */*","Content-Type":"application/json"},body:JSON.stringify(c)}).then(b=>b.json()).then(()=>{s()})};return g("div",{className:"App",children:[o(P,{}),o("div",{className:"h-16"}),o("h1",{className:"text-4sl text-center my-16 font-bold text-2xl",children:"Hello Worlds"}),o("div",{className:"grid grid-cols-4 gap-4 max-w-6xl mx-auto",children:o(d.exports.Suspense,{fallback:o("h1",{children:"load"}),children:o(R,{data:e})})}),g("form",{className:" flex flex-center flex-col mt-16 mx-auto max-w-4xl",onSubmit:t(u),children:[o("input",i({className:"form-input",type:"text"},l("name",{required:!0}))),o("input",i({type:"text"},l("slug"))),o("textarea",i({className:"form-textarea"},l("content"))),o("button",{type:"submit",className:"px-10 py-2 my-10 bg-green-800 text-white rounded-sm",children:"Send"})]})]})}L.render(o(p.StrictMode,{children:o(A,{})}),document.getElementById("root"));export{D as F,o as j};