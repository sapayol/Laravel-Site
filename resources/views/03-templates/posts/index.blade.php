{#
 # Posts index template
 # -------------------
 #
 # This template is loaded whenever http://example.com/news is
 # requested, because it is located at news/index.html in your
 # craft/templates/ folder.
 #
 # See this page for more details on how Craft routes requests:
 # http://buildwithcraft.com/docs/routing
 #}

{% extends "_layout" %}
{% set title = "Posts" %}

{% block content %}
	<h1>Posts</h1>

	{% for post in craft.entries.section('posts').find() %}
		<article>
			<h3><a href="{{ post.url }}">{{ post.title }}</a></h3>
			<p>Posted on {{ post.postDate.format('F d, Y') }}</p>
			{{ post.body.getPage(1) }}
			<p><a href="{{ post.url }}">Continue reading</a></p>
		</article>
	{% endfor %}
{% endblock %}
