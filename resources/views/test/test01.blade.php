{# app/Resources/views/security/login.html.twig #}
{% extends 'base_old_notlog.html.twig' %}

{% block title %}Registration form{% endblock %}


{% block content %}
<div>
    <p> Api Controller in action {{ testValue01 }} </p>
    <br>
    {{ dump() }}


    <b>Вывод одномерного массива</b> <br>
    {% for key in testArray01 %}
        Department: {{ key }} <br>
    {% endfor %}
    <br>

    <b>Вывод двумерного ассоциативного массива (ключ - значение(одномерный массив))</b><br>
    {% for key_dep, departmentsArray in testArray02 %}
        Department: {{key_dep}}<br>
       {% for key2, val2 in departmentsArray %}
           Name {{ key2 }} - {{ val2 }}
       {% endfor %} <br>
{#        {{ dump() }}#}
    {% endfor %}
    <br>
    <b> Вывод трехмерного ассоциативного массива (ключ - значение(одномерный массив элементами которого, являются
    ассоциативные массивы)) </b> <br>
    {% for key_dep, departmentsArray in testArray03 %}
        Department: {{key_dep}}<br>
        {% for key_data, dataArray in departmentsArray %}
            {% for key, value in dataArray %}
                {{ key }} - {{ value }}
            {% endfor %} <br>
        {% endfor %} <br>
{#                {{ dump() }}#}
    {% endfor %}
    <b>Вывод массива серверных параметров</b> <br>
    {% for key, value in serverArray %}
        Key: {{ key }}, Value: {{ value }}  <br>
    {% endfor %}
    <br>

</div>
{% endblock %}