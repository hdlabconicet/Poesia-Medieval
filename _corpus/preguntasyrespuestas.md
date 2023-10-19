---
layout: page
title: Preguntas y respuestas del Cancionero de Baena
permalink: /preguntasyrespuestas/
---

## Búsqueda
<div id="alphabet-search" class="py-4 ml-4">
</div>

<br/>

## Preguntas y respuestas

<ul class="text-list">
{% assign sorted_preg_resp = site.preguntas_respuestas | sort: "title" %}
{% for my_preg_resp in sorted_preg_resp %}
    <li><a href="{{site.baseurl}}/{{my_preg_resp.url}}">{{ my_preg_resp.title }}</a></li>
{% endfor %}
</ul>


<script src="{{site.baseurl}}/assets/js/alphabetical-search.js"/>
