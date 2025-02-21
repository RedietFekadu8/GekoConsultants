import{u as Q}from"./AddonConditions.d752aadc.js";import{_ as x}from"./_plugin-vue_export-helper.eefbdd86.js";import{o as r,c as L,a as p,v as l,k as d,q as V,C as i,t as k,l as n,b,F as R,J as $,G as E,x as P,u as w}from"./runtime-dom.esm-bundler.5c3c7d72.js";import{r as W,m as K,u as X,l as Y}from"./index.a87126ce.js";import{C as tt}from"./Blur.edde4939.js";import{G as N,a as G}from"./Row.df38a5f6.js";import{C as F}from"./Card.eb2e90c7.js";import{C as q}from"./Tooltip.73441134.js";import{a as nt}from"./index.1f3cb1fa.js";import{S as et,a as j,b as ot}from"./InternalOutbound.8d129cbf.js";import{S as st}from"./External.3b8c2917.js";import{g as it}from"./Caret.d9cc70ba.js";import{U as rt}from"./AnimatedNumber.f1ad3fb5.js";import"./translations.d159963e.js";import{_ as a,s as H}from"./default-i18n.20001971.js";import{u as at}from"./SeoSiteScore.a202ba55.js";import{C as Z}from"./DonutChartWithLegend.28d3472c.js";import{C as lt}from"./Tabs.7c14121d.js";import{T as z,a as J}from"./Row.2a867ba6.js";import{n as ct}from"./numbers.9fc174f3.js";import{R as ut}from"./RequiredPlans.1d9170ab.js";import{C as pt}from"./Index.ac5cec7c.js";import"./addons.dc226733.js";import"./upperFirst.2cd99bdd.js";import"./_stringToArray.f9ddb970.js";import"./toString.f0787db8.js";import"./helpers.53868b98.js";import"./Slide.39c07c03.js";import"./AnalyzerStore.9a0a800c.js";import"./vue-router.2f910c93.js";import"./ProBadge.751e0b85.js";import"./Information.13e8cece.js";import"./license.d747bfcd.js";import"./constants.1ec71a84.js";const dt={};function _t(t,e){return r(),L("div")}const mt=x(dt,[["render",_t]]),ft={},kt={viewBox:"0 0 19 17",fill:"none",xmlns:"http://www.w3.org/2000/svg",class:"aioseo-link-orphaned"},gt=p("path",{d:"M13.875 3.87495H10.375V5.53745H13.875C15.3713 5.53745 16.5875 6.7537 16.5875 8.24995C16.5875 9.5012 15.73 10.5512 14.5663 10.8575L15.8438 12.135C17.27 11.4087 18.25 9.9562 18.25 8.24995C18.25 5.83495 16.29 3.87495 13.875 3.87495ZM13 7.37495H11.0838L12.8338 9.12495H13V7.37495ZM0.75 1.4862L3.47125 4.20745C2.66729 4.53457 1.97904 5.09383 1.49435 5.81385C1.00966 6.53387 0.750518 7.38199 0.75 8.24995C0.75 10.665 2.71 12.625 5.125 12.625H8.625V10.9625H5.125C3.62875 10.9625 2.4125 9.7462 2.4125 8.24995C2.4125 6.8587 3.47125 5.71245 4.8275 5.5637L6.63875 7.37495H6V9.12495H8.38875L10.375 11.1112V12.625H11.8888L15.3975 16.125L16.5 15.0225L1.86125 0.374954L0.75 1.4862Z",fill:"currentColor"},null,-1),ht=[gt];function bt(t,e){return r(),L("svg",kt,ht)}const Lt=x(ft,[["render",bt]]),O="all-in-one-seo-pack",vt={components:{CoreTooltip:q,SvgCircleQuestionMark:nt,SvgLinkAffiliate:et,SvgLinkExternal:st,SvgLinkInternalInbound:j,SvgLinkOrphaned:Lt,SvgSearch:it,UtilAnimatedNumber:rt},props:{type:{type:String,required:!0},count:{type:Number,required:!0}},data(){return{strings:{orphanedPostsDescription:a("Orphaned posts are posts that have no inbound internal links yet and may be more difficult to find by search engines.",O)},icons:[{type:"posts",name:a("Posts Crawled",O),icon:"svg-search"},{type:"external",name:a("External Links",O),icon:"svg-link-external"},{type:"internal",name:a("Internal Links",O),icon:"svg-link-internal-inbound"},{type:"affiliate",name:a("Affiliate Links",O),icon:"svg-link-affiliate"},{type:"orphaned",name:a("Orphaned Posts",O),icon:"svg-link-orphaned"}]}},computed:{getType(){return this.icons.find(t=>t.type===this.type)},getLink(){switch(this.type){case"posts":case"affiliate":case"internal":return"#/links-report?fullReport=1";case"external":return"#/domains-report";case"orphaned":return"#/links-report?orphaned-posts=1";default:return""}}}},yt=["href"],xt={class:"aioseo-link-count-top"},wt={class:"aioseo-link-count-bottom"},Ct={class:"disabled-button gray"};function Tt(t,e,o,_,s,c){const m=l("util-animated-number"),u=l("svg-circle-question-mark"),f=l("core-tooltip");return r(),L("a",{class:"aioseo-link-count",href:c.getLink},[p("div",xt,[(r(),d(V(c.getType.icon))),i(m,{number:parseInt(o.count)},null,8,["number"])]),p("div",wt,[p("span",null,k(c.getType.name),1),o.type==="orphaned"?(r(),d(f,{key:0},{tooltip:n(()=>[p("span",null,k(s.strings.orphanedPostsDescription),1)]),default:n(()=>[p("div",Ct,[i(u)])]),_:1})):b("",!0)])],8,yt)}const St=x(vt,[["render",Tt]]),Ot={components:{CoreCard:F,GridColumn:N,GridRow:G,LinkCount:St},props:{totals:{type:Object,required:!0}}};function At(t,e,o,_,s,c){const m=l("LinkCount"),u=l("grid-column"),f=l("grid-row"),y=l("core-card");return r(),d(y,{class:"aioseo-link-assistant-statistics",slug:"internalLinksOverviewCounter",toggles:!1,"no-slide":"","hide-header":""},{default:n(()=>[i(f,null,{default:n(()=>[i(u,{class:"counter divider-right",oneFifth:""},{default:n(()=>[i(m,{type:"posts",count:o.totals.crawledPosts},null,8,["count"])]),_:1}),i(u,{class:"counter divider-right",oneFifth:""},{default:n(()=>[i(m,{type:"orphaned",count:o.totals.orphanedPosts},null,8,["count"])]),_:1}),i(u,{class:"counter divider-right",oneFifth:""},{default:n(()=>[i(m,{type:"external",count:o.totals.externalLinks},null,8,["count"])]),_:1}),i(u,{class:"counter divider-right",oneFifth:""},{default:n(()=>[i(m,{type:"internal",count:o.totals.internalLinks},null,8,["count"])]),_:1}),i(u,{class:"counter",oneFifth:""},{default:n(()=>[i(m,{type:"affiliate",count:o.totals.affiliateLinks},null,8,["count"])]),_:1})]),_:1})]),_:1})}const Pt=x(Ot,[["render",At]]),A="all-in-one-seo-pack",Dt={setup(){const{strings:t}=at();return{composableStrings:t}},components:{CoreCard:F,CoreDonutChartWithLegend:Z},props:{totals:{type:Object,required:!0}},data(){return{strings:W(this.composableStrings,{header:a("Internal vs External vs Affiliate Links",A),totalLinks:a("Total Links",A),linksReportLink:H('<a href="%1$s">%2$s</a><a href="%1$s"> <span>&rarr;</span></a>',"#/links-report?fullReport=1",a("See a Full Links Report",A))})}},computed:{parts(){return[{slug:"external",name:a("External Links",A),count:this.totals.externalLinks},{slug:"affiliate",name:a("Affiliate Links",A),count:this.totals.affiliateLinks},{slug:"internal",name:a("Internal Links",A),count:this.totals.internalLinks}]},sortedParts(){const t=this.parts;return t.sort(function(e,o){return o.count>e.count?1:-1}),t[0].ratio=100,t[1].ratio=t[1].count/this.totals.totalLinks*100,t[2].ratio=t[2].count/this.totals.totalLinks*100,t.forEach(e=>{switch(e.slug){case"external":{e.color="#005AE0";break}case"internal":{e.color="#00AA63";break}case"affiliate":{e.color="#F18200";break}}}),t.filter(function(e){return e.count!==0}),t.forEach((e,o)=>(o===0||t.forEach((_,s)=>(o<s&&(e.ratio=e.ratio+_.ratio),e)),e)),t}}};function It(t,e,o,_,s,c){const m=l("core-donut-chart-with-legend"),u=l("core-card");return r(),d(u,{class:"aioseo-link-assistant-link-ratio",slug:"linkAssistantLinkRatio","no-slide":"","header-text":s.strings.header},{default:n(()=>[i(m,{parts:c.sortedParts,total:o.totals.totalLinks,label:s.strings.totalLinks,link:s.strings.linksReportLink},null,8,["parts","total","label","link"])]),_:1},8,["header-text"])}const Rt=x(Dt,[["render",It]]),C="all-in-one-seo-pack",$t={components:{CoreCard:F,CoreMainTabs:lt,CoreTooltip:q,SvgLinkInternalInbound:j,SvgLinkInternalOutbound:ot,TableColumn:z,TableRow:J},props:{linkingOpportunities:{type:Object,required:!0}},data(){return{activeTab:"inbound",strings:{linkingOpportunities:a("Linking Opportunities",C),noResults:a("No items found.",C)},link:H('<a class="links-report-link" href="%1$s">%2$s</a><a href="%1$s"> <span>&rarr;</span></a>',"#/links-report?linkingOpportunities=1",a("See All Linking Opportunities",C)),tabs:[{slug:"inbound",name:a("Inbound Suggestions",C)},{slug:"outbound",name:a("Outbound Suggestions",C)}],columns:[{slug:"post-title",label:a("Post Title",C)},{slug:"suggestions-count",label:a("Count",C)}]}},computed:{opportunities(){return this.linkingOpportunities[this.activeTab]}}},Et={class:"linking-opportunities-table"},Ft={class:"row"},Ht={key:0},qt={key:1,class:"aioseo-tooltip-wrapper"},Bt=["innerHTML"],Mt={class:"row"},Ut=["href"],Vt={class:"count"},Nt={class:"count"},Gt={key:0,class:"links-report-link"},jt=["innerHTML"];function Zt(t,e,o,_,s,c){const m=l("core-main-tabs"),u=l("core-tooltip"),f=l("table-column"),y=l("table-row"),D=l("router-link"),g=l("core-card");return r(),d(g,{class:"aioseo-link-assistant-linking-opportunities",slug:"linkAssistantLinkOpportunities","no-slide":"","header-text":s.strings.linkingOpportunities},{tabs:n(()=>[i(m,{tabs:s.tabs,showSaveButton:!1,active:s.activeTab,onChanged:e[0]||(e[0]=v=>s.activeTab=v),internal:""},null,8,["tabs","active"])]),default:n(()=>{var v,B,M;return[p("div",null,[p("div",Et,[(v=c.opportunities)!=null&&v.length?(r(),d(y,{key:0,class:"header-row"},{default:n(()=>[(r(!0),L(R,null,$(s.columns,(h,I)=>(r(),d(f,{key:I,class:E(h.slug)},{default:n(()=>[p("div",Ft,[h.tooltipIcon?b("",!0):(r(),L("div",Ht,k(h.label),1)),h.tooltipIcon?(r(),L("div",qt,[i(u,{class:"action"},{tooltip:n(()=>[p("span",{innerHTML:h.label},null,8,Bt)]),default:n(()=>[(r(),d(V(h.tooltipIcon)))]),_:2},1024)])):b("",!0)])]),_:2},1032,["class"]))),128))]),_:1})):b("",!0),(r(!0),L(R,null,$(c.opportunities,(h,I)=>(r(),d(y,{key:I,class:E(["row",{even:I%2===0}])},{default:n(()=>[i(f,{class:"post-title"},{default:n(()=>[p("div",Mt,[i(u,{type:"action"},{tooltip:n(()=>[p("a",{class:"tooltip-url",href:h.permalink,target:"_blank"},k(h.postTitle),9,Ut)]),default:n(()=>[i(D,{to:{name:"links-report",query:{postTitle:h.postTitle}}},{default:n(()=>[P(k(h.postTitle),1)]),_:2},1032,["to"])]),_:2},1024)])]),_:2},1024),s.activeTab==="inbound"?(r(),d(f,{key:0,class:"internal-inbound"},{default:n(()=>[p("span",Vt,k(h.inboundSuggestions),1)]),_:2},1024)):b("",!0),s.activeTab==="outbound"?(r(),d(f,{key:1,class:"internal-outbound"},{default:n(()=>[p("span",Nt,k(h.outboundSuggestions),1)]),_:2},1024)):b("",!0)]),_:2},1032,["class"]))),128)),(B=c.opportunities)!=null&&B.length?b("",!0):(r(),d(y,{key:1,class:"row even"},{default:n(()=>[i(f,{class:"post-title"},{default:n(()=>[P(k(s.strings.noResults),1)]),_:1})]),_:1}))]),(M=c.opportunities)!=null&&M.length?(r(),L("div",Gt,[p("span",{innerHTML:s.link},null,8,jt)])):b("",!0)])]}),_:1},8,["header-text"])}const zt=x($t,[["render",Zt]]),T="all-in-one-seo-pack",Jt={components:{CoreCard:F,CoreTooltip:q,CoreDonutChartWithLegend:Z,TableColumn:z,TableRow:J},props:{totals:{type:Object,required:!0},mostLinkedDomains:{type:Array,required:!0}},data(){return{numbers:ct,strings:{mostLinkedDomains:a("Most Linked to Domains",T),totalExternalLinks:a("Total External Links",T),noResults:a("No items found.",T),link:H('<a href="%1$s">%2$s</a><a href="%1$s"> <span>&rarr;</span></a>',"#/domains-report?fullReport=1",a("See a Full Domains Report",T))}}},computed:{sortedParts(){const t=this.mostLinkedDomains.map(o=>o).splice(0,3);let e=this.totals.externalLinks;return t[0]&&(t[0].color="#005AE0",t[0].ratio=100,e=e-t[0].count),t[1]&&(t[1].color="#80ACF0",t[1].ratio=t[1].count/this.totals.externalLinks*100,e=e-t[1].count),t[2]&&(t[2].color="#BFD6F7",t[2].ratio=t[2].count/this.totals.externalLinks*100,e=e-t[2].count),e&&t.push({name:a("other domains",T),color:"#E8E8EB",count:e,ratio:e/this.totals.externalLinks*100,last:!0}),t.filter(function(o){return o.count!==0}).sort(function(o,_){return parseInt(_.count)>parseInt(o.count)?1:-1}),t.forEach((o,_)=>(_===0||t.forEach((s,c)=>(_<c&&(o.ratio=o.ratio+s.ratio),o)),o)),t},columns(){return[{slug:"name",label:a("Domain",T)},{slug:"count",label:a("# of Links",T)}]}}},Qt={class:"domains-table"},Wt={class:"row"},Kt=["src"],Xt=["href"],Yt=["href"];function tn(t,e,o,_,s,c){const m=l("core-donut-chart-with-legend"),u=l("table-column"),f=l("table-row"),y=l("core-tooltip"),D=l("core-card");return r(),d(D,{class:"aioseo-link-assistant-linked-domains",slug:"linkAssistantLinkedDomains","no-slide":"","header-text":s.strings.mostLinkedDomains},{default:n(()=>[i(m,{parts:c.sortedParts,total:o.totals.externalLinks,label:s.strings.totalExternalLinks,link:s.strings.link},null,8,["parts","total","label","link"]),p("div",Qt,[i(f,{class:"header-row"},{default:n(()=>[(r(!0),L(R,null,$(c.columns,(g,v)=>(r(),d(u,{key:v,class:E(g.slug)},{default:n(()=>[P(k(g.label),1)]),_:2},1032,["class"]))),128))]),_:1}),(r(!0),L(R,null,$(o.mostLinkedDomains,(g,v)=>(r(),d(f,{key:v,class:E(["row",{even:v%2===0}])},{default:n(()=>[i(u,{class:"domain"},{default:n(()=>[p("div",Wt,[p("img",{alt:"Domain Favicon",class:"favicon",src:`https://www.google.com/s2/favicons?sz=32&domain=${g.name}`},null,8,Kt),i(y,{type:"action"},{tooltip:n(()=>[p("a",{class:"tooltip-url",href:`https://${g.name}`,target:"_blank"},k(g.name),9,Yt)]),default:n(()=>[p("a",{class:"domain-name",href:`#/domains-report?hostname=${g.name}`},k(g.name),9,Xt)]),_:2},1024)])]),_:2},1024),i(u,{class:"count"},{default:n(()=>[p("span",null,k(s.numbers.numberFormat(g.count)),1)]),_:2},1024)]),_:2},1032,["class"]))),128)),o.mostLinkedDomains.length?b("",!0):(r(),d(f,{key:0,class:"row even"},{default:n(()=>[i(u,{class:"domain"},{default:n(()=>[P(k(s.strings.noResults),1)]),_:1})]),_:1}))])]),_:1},8,["header-text"])}const nn=x(Jt,[["render",tn]]),en={components:{CoreBlur:tt,GridColumn:N,GridRow:G,LinkCounts:Pt,LinkRatio:Rt,LinkingOpportunities:zt,MostLinkedDomains:nn},props:{showTotals:{type:Boolean,default(){return!0}}},computed:{totals(){return{crawledPosts:102,externalLinks:753,internalLinks:56,affiliateLinks:175,orphanedPosts:78,totalLinks:984}},linkingOpportunities(){return[{postTitle:"Test Post Title 1",postId:"123",suggestionsInbound:"2",suggestionsOutbound:"13"},{postTitle:"Test Post Title 2",postId:"124",suggestionsInbound:"2",suggestionsOutbound:"13"},{postTitle:"Test Post Title 3",postId:"125",suggestionsInbound:"2",suggestionsOutbound:"13"},{postTitle:"Test Post Title 4",postId:"126",suggestionsInbound:"2",suggestionsOutbound:"13"},{postTitle:"Test Post Title 5",postId:"127",suggestionsInbound:"2",suggestionsOutbound:"13"}]},mostLinkedDomains(){return[{name:"aioseo.com",count:100},{name:"wpbeginner.com",count:99},{name:"wpforms.com",count:50},{name:"optinmonster.com",count:40},{name:"monsterinsights.com",count:30},{name:"smashballoon.com",count:20},{name:"exactmetrics.com",count:10},{name:"seedprod.com",count:5},{name:"awesomemotive.com",count:4},{name:"easydigitaldownloads.com",count:3}]}}};function on(t,e,o,_,s,c){const m=l("link-counts"),u=l("grid-column"),f=l("grid-row"),y=l("link-ratio"),D=l("linking-opportunities"),g=l("most-linked-domains"),v=l("core-blur");return r(),d(v,null,{default:n(()=>[o.showTotals?(r(),d(f,{key:0,class:"overview-link-count"},{default:n(()=>[i(u,null,{default:n(()=>[i(m,{totals:c.totals},null,8,["totals"])]),_:1})]),_:1})):b("",!0),i(f,null,{default:n(()=>[i(u,{md:"6"},{default:n(()=>[i(y,{totals:c.totals},null,8,["totals"]),i(D,{"linking-opportunities":c.linkingOpportunities},null,8,["linking-opportunities"])]),_:1}),i(u,{md:"6"},{default:n(()=>[i(g,{totals:c.totals,"most-linked-domains":c.mostLinkedDomains},null,8,["totals","most-linked-domains"])]),_:1})]),_:1})]),_:1})}const sn=x(en,[["render",on]]),S="all-in-one-seo-pack",rn={setup(){return{licenseStore:K(),rootStore:X(),links:Y}},components:{Blur:sn,RequiredPlans:ut,Cta:pt},data(){return{strings:{ctaButtonText:a("Unlock Link Assistant",S),ctaHeader:H(a("Link Assistant is a %1$s Feature",S),"PRO"),linkAssistantDescription:a("Get relevant suggestions for adding internal links to all your content as well as finding any orphaned posts that have no internal links.",S),linkOpportunities:a("Actionable Link Suggestions",S),orphanedPosts:a("See Orphaned Posts",S),affiliateLinks:a("See Affiliate Links",S),domainReports:a("Top Domain Reports",S)}}}},an={class:"aioseo-link-assistant-overview"};function ln(t,e,o,_,s,c){const m=l("blur"),u=l("required-plans"),f=l("cta");return r(),L("div",an,[i(m),i(f,{class:"aioseo-link-assistant-cta","cta-link":_.links.getPricingUrl("link-assistant","link-assistant-upsell","overview"),"button-text":s.strings.ctaButtonText,"learn-more-link":_.links.getUpsellUrl("link-assistant","overview",_.rootStore.isPro?"pricing":"liteUpgrade"),"feature-list":[s.strings.linkOpportunities,s.strings.domainReports,s.strings.orphanedPosts,s.strings.affiliateLinks],"align-top":"","hide-bonus":!_.licenseStore.isUnlicensed},{"header-text":n(()=>[P(k(s.strings.ctaHeader),1)]),description:n(()=>[i(u,{addon:"aioseo-link-assistant"}),P(" "+k(s.strings.linkAssistantDescription),1)]),_:1},8,["cta-link","button-text","learn-more-link","feature-list","hide-bonus"])])}const U=x(rn,[["render",ln]]),cn={class:"aioseo-link-assistant-overview"},Gn={__name:"Overview",setup(t){const{shouldShowActivate:e,shouldShowLite:o,shouldShowMain:_,shouldShowUpdate:s}=Q({addonSlug:"aioseo-link-assistant"});return(c,m)=>(r(),L("div",cn,[w(_)?(r(),d(w(U),{key:0})):b("",!0),w(s)||w(e)?(r(),d(w(mt),{key:1})):b("",!0),w(o)?(r(),d(w(U),{key:2})):b("",!0)]))}};export{Gn as default};
