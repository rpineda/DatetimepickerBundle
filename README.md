#DatetimepickerBundle

This bundle implements the [Eonasdan Bootstrap DateTime Picker](https://github.com/Eonasdan/bootstrap-datetimepicker) in a Form Type for Symfony 2.*. The bundle structure is inspired by GenemuFormBundle and Fork of SCDatetimepickerBundle.

Demo : http://eonasdan.github.io/bootstrap-datetimepicker/

Please feel free to contribute, to fork, to send merge request and to create ticket.

##Installation

### Step 1: Install DatetimepickerBundle

Add the following dependency to your composer.json file:

``` json
{
    "require": {

        "digitalframe/datetimepicker-bundle": "dev-master"
    }
}
```

and then run

```bash
php composer.phar update digitalframe/datetimepicker-bundle
```

### Step 2: Enable the bundle

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Digitalframe\DatetimepickerBundle\DigitalframeDatetimepickerBundle(),
    );
}
```

``` yml
# app/config/config.yml
sc_datetimepicker:
    picker: ~
```

### Step 3: Initialize assets

``` bash
$ php app/console assets:install web/
```

## Usages

``` php
<?php
// ...
public function buildForm(FormBuilder $builder, array $options)
{
    $builder
        // defaut options
        ->add('createdAt', 'df_datetime')
        
        // full options
        ->add('updatedAt', 'df_datetime', array(
            'locale' => 'es',
            'format' => 'DD/MM/YYYY'
        )) ;

}
```

Add form_javascript and form_stylesheet

The principle is to separate the javascript, stylesheet and html.
This allows better integration of web pages.

### Example:

``` twig
{% block stylesheets %}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
    
    {{ form_stylesheet(form) }}
{% endblock %}

{% block javascripts %}
    <script src="{{ asset('js/jquery.min.jss') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    
    {{ form_javascript(form) }}
{% endblock %}

{% block body %}
    <form action="{{ path('my_route_form') }}" type="post" {{ form_enctype(form) }}>
        {{ form_widget(form) }}

        <input type="submit" />
    </form>
{% endblock %}
```

## Documentation

The documentation of the datetime picker is here : http://eonasdan.github.io/bootstrap-datetimepicker/Options/

## Notes

The date format from ``` php 'array('format'=>'DD/MM/YYYY') ``` is used to set automatically the date format of Symfony in order to make compatible Symfony and JavaScript output.
## Modify locale to moments - RECORDATORIO
But there are some problems for example with ``` php MM``` which display "décembre" in PHP intl translation and "Decembre" in Bootstrap translation. That is why I edited js/locales/bootstrap-datetimepicker.fr.js

