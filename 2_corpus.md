---
layout: page
title: Corpus
permalink: /corpus/
---

<p class="prosa">Esta sección presenta un corpus de poemas editados y reconstruidos desde lo filológico y lo musicológico ordenados según la tradición poética a la que pertenecen : "Preguntas y respuestas del Cancionero de Baena" y "Cantigas medievales gallego-portuguesas". Cada texto se encuentra acompañado de información útil para el estudio de la poesía ibérica medieval que pueden visualizarse al clickear el botón "Métrica y rima" que se encuentra en la esquina superior derecha de la pantalla. Más información sobre el esquema rimático se puede obtener al desplazar el cursor sobre la sílaba final de un verso, lo que hace que se destaquen todos los finales de verso con la misma rima.  
</p>
<p class="prosa">En el caso de las cantigas gallego-portuguesas, se ofrecen además audios y partituras donde este juego compositivo se pone de manifiesto desde el elemento melódico.</p>

<div id="alphabet-search" class="py-4 ml-4">
</div>

## Preguntas y respuestas

<ul class="text-list">
{% assign sorted_preg_resp = site.preguntas_respuestas | sort: "title" %}
{% for my_preg_resp in sorted_preg_resp %}
    <li><a href="{{site.baseurl}}/{{my_preg_resp.url}}">{{ my_preg_resp.title }}</a></li>
{% endfor %}
</ul>

## Cantigas 

<ul class="text-list">
{% assign sorted_cantigas = site.cantigas | sort: "title" %}
{% for my_cantiga in sorted_cantigas %}
    <li><a href="{{site.baseurl}}/{{my_cantiga.url}}">{{ my_cantiga.title }}</a></li>
{% endfor %}
</ul>

<script src="{{site.baseurl}}/assets/js/alphabetical-search.js"/>