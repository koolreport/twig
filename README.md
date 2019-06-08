# Twig

## Overview

Starting from version 4.0.0, KoolReport supports other template engines rather than just its own template view file. `Twig` is one of the popular template engines that KoolReport supports.

## Installation

#### By downloading .zip file

1. [Download](https://www.koolreport.com/packages/twig)
2. Unzip the zip file
3. Copy the folder `twig` into `koolreport` folder so that look like below

```bash
koolreport
├── core
├── twig
```

#### By composer

```
composer require koolreport/twig
```

## Get started

__Step 1:__ Add the twig service to your report

```
class Report extends \koolreport\KoolReport
{
    use \koolreport\clients\Bootstrap;

    use \koolreport\twig\Engine;
    protected function twigInit()
    {
        $loader = new \Twig\Loader\FilesystemLoader(dirname(__FILE__).'/views');
        $twig = new \Twig\Environment($loader);
        return $twig;
    }
    ...
}
```

__Step 2:__ Create the view `report.html` inside `views` folder like below:

```
<html>
<head>
    <title>Welcome to Twig</title>
</head>
<body>
    <h1>Welcome to Twig</h1>
    {{ 
        widget('koolreport.widgets.koolphp.Table',{
            dataSource:report.dataStore("data"),
        }) 
    }}
</body>
</html>
```

__Step 3:__ You can run your report with following line of code

```
$report = new Report;
$report->run()->render("report.html");
```

__Congrat__, Now you can use Twig to design your report.


## Some notes:

1. In your template, you refer to report object with parameter `report`
2. When use function `widget()` to generate koolreport's widget, you should change the backslash `\` in the class name to dot `"."`, for example, you change: `\koolreport\widgets\koolphp\Table` to `koolreport.widgets.koolphp.Table`
3. You can reference to any datastore with `report.dataStore("name_of_datastore")`

## Limitation

There are some limitation due to the fact that `Twig` does not allow PHP to run within. This limits some of capability of KoolReport's widget such as defining anonymous function. For example, there is no way to define custom function to format value in Table widget like this.

```
Table::create(array(
    ...
    "columns"=>array(
        "id"=>array(
            "formatValue"=>function($value)
            {
                return "<a href='$value'>View</a>";
            }
        )
    )
))
```

Simply it is not able to transform above php code to json definition in twig.

# Resources

1. [Full documentation](https://www.koolreport.com/docs/twig/overview/)
2. [Examples & Demonstration](https://www.koolreport.com/examples)


# Support

Please use [our forum](https://www.koolreport.com/forum/topics) if you need support, by this way other people can benefit as well. If the support request need privacy, you may send email to us at [support@koolreport.com](mailto:support@koolreport.com).