---
layout: page
title: Corpus
permalink: /corpus/
---


## Preguntas y respuestas
<ul>
{% for my_preg_resp in site.preguntas_respuestas %}
    <li><a href="{{site.baseurl}}/{{my_preg_resp.url}}">{{ my_preg_resp.title }}</a></li>
{% endfor %}
</ul>

## Cantigas
<ul>
{% for my_cantiga in site.cantigas %}
    <li><a href="{{site.baseurl}}/{{my_cantiga.url}}">{{ my_cantiga.title }}</a></li>
{% endfor %}
</ul>