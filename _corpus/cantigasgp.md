---
layout: page
title: Cantigas gallego-portuguesas
permalink: /cantigasgp/
---

## Búsqueda
<div id="alphabet-search" class="py-4 ml-4">
</div>

<br/>

## Cantigas 

<ul class="text-list">
{% assign sorted_cantigas = site.cantigas | sort: "title" %}
{% for my_cantiga in sorted_cantigas %}
    <li><a href="{{site.baseurl}}/{{my_cantiga.url}}">{{ my_cantiga.title }}</a></li>
{% endfor %}
</ul>

<script src="{{site.baseurl}}/assets/js/alphabetical-search.js"/>
