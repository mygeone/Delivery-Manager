<?php
include("header.php");
include("config.php");
include("footer.php");


?>

<div class="container d-flex justify-content-center pt-5">
    <p class="display-4 justify-content-center mb-5">Consultas SQL</p>
</div>

<div class="container my-3">
    <div class="row">
        <div id="legend">
            <legend class="">Update</legend>
        </div>
    </div>
</div>

    <div class="container border">
        <font face="Courier New" size="2">
        <font color = "blue">update</font>&nbsp;<font color = "maroon">public</font><font color = "silver">.</font><font color = "maroon">&quot;Productos&quot;</font>
        <br/><font color = "blue">set</font>&nbsp;<font color = "maroon">&quot;Cant_Prod&quot;</font>&nbsp;<font color = "silver">=</font>&nbsp;<font color = "maroon">&quot;Cant_Prod&quot;</font>&nbsp;<font color = "silver">+</font>&nbsp;<font color = "maroon">(</font><font color = "blue">select</font>&nbsp;<font color = "maroon">&quot;Cant_Producto_Pagado&quot;</font>&nbsp;<font color = "blue">as</font>&nbsp;<font color = "maroon">toReStock</font>
        <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">from</font>&nbsp;<font color = "maroon">public</font><font color = "silver">.</font><font color = "maroon">&quot;OrdenDetalleProductos&quot;</font>
        <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">where</font>&nbsp;<font color = "maroon">&quot;ID_Producto_Pagado&quot;</font>&nbsp;<font color = "silver">=</font>&nbsp;<font color = "red">'7410'</font>
        <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">and</font>&nbsp;<font color = "maroon">&quot;Orden_ID&quot;</font>&nbsp;<font color = "silver">=</font>&nbsp;<font color = "red">'49697'</font><font color = "maroon">)</font>
        <br/><font color = "blue">where</font>&nbsp;<font color = "maroon">&quot;Prod_ID&quot;</font>&nbsp;<font color = "silver">=</font>&nbsp;<font color = "red">'7410'</font><font color = "maroon">ASC</font>
        </font>
    </div>
    

    <div class="container my-3 border">
        <font face="Courier New" size="2">
        <font color = "blue">UPDATE</font>&nbsp;<font color = "maroon">public</font><font color = "silver">.</font><font color = "maroon">&quot;Productos&quot;</font>
        <br/><font color = "blue">SET</font>&nbsp;<font color = "maroon">&quot;Nombre_Prod&quot;</font>&nbsp;<font color = "silver">=</font><font color = "red">'Mani&nbsp;Japones&nbsp;Chico'</font><font color = "silver">,</font>
        <br/>&nbsp;&nbsp;&nbsp;&nbsp;<font color = "maroon">&quot;Precio_Prod&quot;</font>&nbsp;<font color = "silver">=</font><font color = "red">'1500'</font><font color = "silver">,</font>
        <br/>&nbsp;&nbsp;&nbsp;&nbsp;<font color = "maroon">&quot;Cant_Prod&quot;</font>&nbsp;<font color = "silver">=</font><font color = "red">'80'</font><font color = "blue">WHERE</font>
        <br/><font color = "maroon">&quot;&nbsp;&nbsp;&nbsp;&nbsp;Prod_ID&quot;</font>&nbsp;<font color = "silver">=</font><font color = "red">'34803'</font>
        </font>
    </div>

<div class="container mt-5 mb-3">
    <div class="row">
        <div id="legend">
            <legend class="">Insert</legend>
        </div>
    </div>
</div>

    <div class="container my-3 border">
        <font face="Courier New" size="2">
        <font color = "blue">select</font>&nbsp;<font color = "blue">exists</font><font color = "maroon">(</font><font color = "blue">select</font>&nbsp;<font color = "maroon">&quot;Alias_Direccion&quot;</font><font color = "silver">,</font><font color = "maroon">&quot;Rut_Titular&quot;</font>
        <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">from</font>&nbsp;<font color = "maroon">public</font><font color = "silver">.</font><font color = "maroon">&quot;Direccion&quot;</font>
        <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">where</font>&nbsp;<font color = "maroon">&quot;Alias_Direccion&quot;</font>&nbsp;<font color = "silver">=</font>&nbsp;<font color = "red">'casa&nbsp;mama'</font>
        <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">and</font>&nbsp;<font color = "maroon">&quot;Rut_Titular&quot;</font>&nbsp;<font color = "silver">=</font>&nbsp;<font color = "red">'9492314k'</font><font color = "maroon">)</font>
        </font>

        <br>

        <font face="Courier New" size="2">
        <font color = "blue">INSERT</font>&nbsp;<font color = "blue">INTO</font>&nbsp;<font color = "maroon">public</font><font color = "silver">.</font><font color = "maroon">&quot;MetodoPago&quot;</font>
        <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "maroon">(</font><font color = "maroon">&quot;Rut_Titular&quot;</font><font color = "silver">,</font><font color = "maroon">&quot;Alias_Metodo&quot;</font><font color = "silver">,</font><font color = "maroon">&quot;Nombre_Metodo&quot;</font><font color = "silver">,</font><font color = "maroon">&quot;Numero_Tarjeta&quot;</font><font color = "silver">,</font><font color = "maroon">&quot;CCV&quot;</font><font color = "silver">,</font><font color = "maroon">&quot;Fecha_Exp&quot;</font><font color = "maroon">)</font>
        <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">values</font>&nbsp;<font color = "maroon">(</font><font color = "red">'160770641'</font><font color = "silver">,</font>&nbsp;<font color = "red">'paypal'</font><font color = "silver">,</font>&nbsp;<font color = "red">'Crédito'</font><font color = "silver">,</font>&nbsp;<font color = "red">'151684654'</font><font color = "silver">,</font>&nbsp;<font color = "red">'848'</font><font color = "silver">,</font>&nbsp;<font color = "red">'2020-07-07'</font>&nbsp;<font color = "maroon">)</font>&nbsp;&nbsp;&nbsp;<font color = "silver">=</font>&nbsp;<font color = "red">'9492314k'</font><font color = "maroon">)</font>
        </font>
    </div>


    <div class="container my-3 border">
        <font face="Courier New" size="2">
        <font color = "blue">INSERT</font>&nbsp;<font color = "blue">INTO</font>&nbsp;<font color = "maroon">public</font><font color = "silver">.</font><font color = "maroon">&quot;MetodoPago&quot;</font>&nbsp;<font color = "maroon">(</font><font color = "maroon">&quot;Rut_Titular&quot;</font><font color = "silver">,</font><font color = "maroon">&quot;Alias_Metodo&quot;</font><font color = "silver">,</font><font color = "maroon">&quot;Nombre_Metodo&quot;</font><font color = "silver">,</font><font color = "maroon">&quot;Numero_Tarjeta&quot;</font><font color = "silver">,</font><font color = "maroon">&quot;CCV&quot;</font><font color = "silver">,</font><font color = "maroon">&quot;Fecha_Exp&quot;</font><font color = "maroon">)</font>
        <br/><font color = "blue">SELECT</font>&nbsp;<font color = "silver">*</font>&nbsp;<font color = "blue">FROM</font>&nbsp;<font color = "maroon">(</font><font color = "red">'160770641'</font><font color = "silver">,</font>&nbsp;<font color = "red">'paypal'</font><font color = "silver">,</font>&nbsp;<font color = "red">'Crédito'</font><font color = "silver">,</font>&nbsp;<font color = "red">'151684654'</font><font color = "silver">,</font>&nbsp;<font color = "red">'848'</font><font color = "silver">,</font>&nbsp;<font color = "red">'2020-07-07'</font>&nbsp;<font color = "maroon">)</font>&nbsp;<font color = "blue">as</font>&nbsp;<font color = "maroon">newValues</font>
        <br/><font color = "blue">WHERE</font>&nbsp;<font color = "blue">NOT</font>&nbsp;<font color = "blue">EXISTS</font>&nbsp;<font color = "maroon">(</font>&nbsp;&nbsp;<font color = "blue">select</font>&nbsp;<font color = "maroon">&quot;Alias_Direccion&quot;</font><font color = "silver">,</font><font color = "maroon">&quot;Rut_Titular&quot;</font>
        <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">from</font>&nbsp;<font color = "maroon">public</font><font color = "silver">.</font><font color = "maroon">&quot;Direccion&quot;</font>
        <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">where</font>&nbsp;<font color = "maroon">&quot;Alias_Direccion&quot;</font>&nbsp;<font color = "silver">=</font>&nbsp;<font color = "red">'casa&nbsp;mama'</font>
        <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">and</font>&nbsp;<font color = "maroon">&quot;Rut_Titular&quot;</font>&nbsp;<font color = "silver">=</font>&nbsp;<font color = "red">'9492314k'</font><font color = "maroon">)</font><font color = "maroon">)</font>
        </font>
    </div>

<div class="container mt-5 mb-3">
    <div class="row">
        <div id="legend">
            <legend class="">Select</legend>
        </div>
    </div>
</div>


<div class="container my-3 border">
    <div><span style="font-family: Courier New; font-size: 10pt;">
    <font color = "blue">select</font>&nbsp;<font color = "maroon">X</font><font color = "silver">.</font><font color = "silver">*</font>
    <br/><font color = "blue">from</font>&nbsp;<font color = "maroon">(</font>&nbsp;&nbsp;&nbsp;<font color = "blue">select</font>&nbsp;<font color = "#FF0080"><b>sum</b></font><font color = "maroon">(</font><font color = "maroon">&quot;Cant_Producto_Pagado&quot;</font><font color = "silver">*</font><font color = "maroon">&quot;Precio_Producto_Pagado&quot;</font><font color = "maroon">)</font>&nbsp;<font color = "blue">as</font>&nbsp;<font color = "maroon">totalCompras</font><font color = "silver">,</font><font color = "maroon">&quot;Comuna&quot;</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">from</font>&nbsp;<font color = "maroon">&quot;OrdenDetalleProductos&quot;</font><font color = "silver">,</font><font color = "maroon">&quot;Orden&quot;</font><font color = "silver">,</font><font color = "maroon">&quot;Direccion&quot;</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">where</font>&nbsp;<font color = "maroon">&quot;OrdenDetalleProductos&quot;</font><font color = "silver">.</font><font color = "maroon">&quot;Orden_ID&quot;</font>&nbsp;<font color = "silver">=</font>&nbsp;<font color = "maroon">&quot;Orden&quot;</font><font color = "silver">.</font><font color = "maroon">&quot;Orden_ID&quot;</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">and</font>&nbsp;<font color = "maroon">&quot;Orden&quot;</font><font color = "silver">.</font><font color = "maroon">&quot;Cliente_ID&quot;</font>&nbsp;<font color = "silver">=</font>&nbsp;<font color = "maroon">&quot;Direccion&quot;</font><font color = "silver">.</font><font color = "maroon">&quot;Rut_Titular&quot;</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">group</font>&nbsp;<font color = "blue">by</font>&nbsp;<font color = "maroon">&quot;Comuna&quot;</font><font color = "maroon">)</font>&nbsp;<font color = "blue">as</font>&nbsp;<font color = "maroon">X</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">where</font>&nbsp;<font color = "maroon">X</font><font color = "silver">.</font><font color = "maroon">totalCompras</font>&nbsp;<font color = "silver">=</font>&nbsp;<font color = "maroon">(</font><font color = "blue">select</font>&nbsp;<font color = "#FF0080"><b>max</b></font><font color = "maroon">(</font><font color = "maroon">X</font><font color = "silver">.</font><font color = "maroon">totalCompras</font><font color = "maroon">)</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">from</font>&nbsp;<font color = "maroon">(</font>&nbsp;<font color = "blue">select</font>&nbsp;<font color = "maroon">&quot;Comuna&quot;</font><font color = "silver">,</font>&nbsp;<font color = "#FF0080"><b>sum</b></font><font color = "maroon">(</font><font color = "maroon">&quot;Cant_Producto_Pagado&quot;</font><font color = "silver">*</font><font color = "maroon">&quot;Precio_Producto_Pagado&quot;</font><font color = "maroon">)</font>&nbsp;<font color = "blue">as</font>&nbsp;<font color = "maroon">totalCompras</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">from</font>&nbsp;<font color = "maroon">&quot;OrdenDetalleProductos&quot;</font><font color = "silver">,</font><font color = "maroon">&quot;Orden&quot;</font><font color = "silver">,</font><font color = "maroon">&quot;Direccion&quot;</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">where</font>&nbsp;<font color = "maroon">&quot;OrdenDetalleProductos&quot;</font><font color = "silver">.</font><font color = "maroon">&quot;Orden_ID&quot;</font>&nbsp;<font color = "silver">=</font>&nbsp;<font color = "maroon">&quot;Orden&quot;</font><font color = "silver">.</font><font color = "maroon">&quot;Orden_ID&quot;</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">and</font>&nbsp;<font color = "maroon">&quot;Orden&quot;</font><font color = "silver">.</font><font color = "maroon">&quot;Cliente_ID&quot;</font>&nbsp;<font color = "silver">=</font>&nbsp;<font color = "maroon">&quot;Direccion&quot;</font><font color = "silver">.</font><font color = "maroon">&quot;Rut_Titular&quot;</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">group</font>&nbsp;<font color = "blue">by</font>&nbsp;<font color = "maroon">&quot;Comuna&quot;</font><font color = "maroon">)</font>&nbsp;<font color = "blue">as</font>&nbsp;<font color = "maroon">X</font>&nbsp;<font color = "maroon">)</font>
    </span></div>
</div>

<div class="container my-3 border border-black">
    <div><span style="font-family: Courier New; font-size: 10pt;">
    <font color = "blue">select</font>&nbsp;<font color = "#FF0080"><b>sum</b></font><font color = "maroon">(</font><font color = "maroon">&quot;Cant_Producto_Pagado&quot;</font><font color = "maroon">)</font>
    <br/><font color = "blue">from</font>&nbsp;<font color = "maroon">public</font><font color = "silver">.</font><font color = "maroon">&quot;OrdenDetalleProductos&quot;</font>
    <br/><font color = "blue">where</font>&nbsp;<font color = "maroon">&quot;Precio_Producto_Pagado&quot;</font>&nbsp;<font color = "silver">=</font>&nbsp;<font color = "maroon">(</font><font color = "blue">select</font>&nbsp;<font color = "#FF0080"><b>max</b></font><font color = "maroon">(</font><font color = "maroon">&quot;Precio_Prod&quot;</font><font color = "maroon">)</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "maroon">rom</font>&nbsp;<font color = "maroon">public</font><font color = "silver">.</font><font color = "maroon">&quot;Productos&quot;</font><font color = "maroon">)</font><font color = "maroon">)</font>
    </span></div>
</div>


<div class="container my-3 border">
    <div><span style="font-family: Courier New; font-size: 10pt;">
    <font color = "blue">select</font>&nbsp;<font color = "maroon">X</font><font color = "silver">.</font><font color = "silver">*</font>
    <br/><font color = "blue">from</font>&nbsp;<font color = "maroon">(</font>&nbsp;&nbsp;&nbsp;<font color = "blue">select</font>&nbsp;<font color = "#FF0080"><b>sum</b></font><font color = "maroon">(</font><font color = "maroon">&quot;Cant_Producto_Pagado&quot;</font><font color = "silver">*</font><font color = "maroon">&quot;Precio_Producto_Pagado&quot;</font><font color = "maroon">)</font>&nbsp;<font color = "blue">as</font>&nbsp;<font color = "maroon">totalCompras</font><font color = "silver">,</font><font color = "maroon">&quot;Ciudad&quot;</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">from</font>&nbsp;<font color = "maroon">&quot;OrdenDetalleProductos&quot;</font><font color = "silver">,</font><font color = "maroon">&quot;Orden&quot;</font><font color = "silver">,</font><font color = "maroon">&quot;Direccion&quot;</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">where</font>&nbsp;<font color = "maroon">&quot;OrdenDetalleProductos&quot;</font><font color = "silver">.</font><font color = "maroon">&quot;Orden_ID&quot;</font>&nbsp;<font color = "silver">=</font>&nbsp;<font color = "maroon">&quot;Orden&quot;</font><font color = "silver">.</font><font color = "maroon">&quot;Orden_ID&quot;</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">and</font>&nbsp;<font color = "maroon">&quot;Orden&quot;</font><font color = "silver">.</font><font color = "maroon">&quot;Cliente_ID&quot;</font>&nbsp;<font color = "silver">=</font>&nbsp;<font color = "maroon">&quot;Direccion&quot;</font><font color = "silver">.</font><font color = "maroon">&quot;Rut_Titular&quot;</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">group</font>&nbsp;<font color = "blue">by</font>&nbsp;<font color = "maroon">&quot;Ciudad&quot;</font><font color = "maroon">)</font>&nbsp;<font color = "blue">as</font>&nbsp;<font color = "maroon">X</font>
    <br/><font color = "blue">where</font>&nbsp;<font color = "maroon">X</font><font color = "silver">.</font><font color = "maroon">totalCompras</font>&nbsp;<font color = "silver">=</font>&nbsp;<font color = "maroon">(</font><font color = "blue">select</font>&nbsp;<font color = "#FF0080"><b>max</b></font><font color = "maroon">(</font><font color = "maroon">X</font><font color = "silver">.</font><font color = "maroon">totalCompras</font><font color = "maroon">)</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">from</font>&nbsp;<font color = "maroon">(</font>&nbsp;<font color = "blue">select</font>&nbsp;<font color = "maroon">&quot;Ciudad&quot;</font><font color = "silver">,</font>&nbsp;<font color = "#FF0080"><b>sum</b></font><font color = "maroon">(</font><font color = "maroon">&quot;Cant_Producto_Pagado&quot;</font><font color = "silver">*</font><font color = "maroon">&quot;Precio_Producto_Pagado&quot;</font><font color = "maroon">)</font>&nbsp;<font color = "blue">as</font>&nbsp;<font color = "maroon">totalCompras</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">from</font>&nbsp;<font color = "maroon">&quot;OrdenDetalleProductos&quot;</font><font color = "silver">,</font><font color = "maroon">&quot;Orden&quot;</font><font color = "silver">,</font><font color = "maroon">&quot;Direccion&quot;</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">where</font>&nbsp;<font color = "maroon">&quot;OrdenDetalleProductos&quot;</font><font color = "silver">.</font><font color = "maroon">&quot;Orden_ID&quot;</font>&nbsp;<font color = "silver">=</font>&nbsp;<font color = "maroon">&quot;Orden&quot;</font><font color = "silver">.</font><font color = "maroon">&quot;Orden_ID&quot;</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">and</font>&nbsp;<font color = "maroon">&quot;Orden&quot;</font><font color = "silver">.</font><font color = "maroon">&quot;Cliente_ID&quot;</font>&nbsp;<font color = "silver">=</font>&nbsp;<font color = "maroon">&quot;Direccion&quot;</font><font color = "silver">.</font><font color = "maroon">&quot;Rut_Titular&quot;</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">group</font>&nbsp;<font color = "blue">by</font>&nbsp;<font color = "maroon">&quot;Ciudad&quot;</font><font color = "maroon">)</font>&nbsp;<font color = "blue">as</font>&nbsp;<font color = "maroon">X</font>&nbsp;<font color = "maroon">)</font>
    </span></div>
</div>

<div class="container  my-3 border">
    <div><span style="font-family: Courier New; font-size: 10pt;">
    <font color = "blue">select</font>&nbsp;<font color = "maroon">cast</font><font color = "maroon">(</font><font color = "#FF0080"><b>SUM</b></font><font color = "maroon">(</font><font color = "maroon">&quot;Precio_Producto_Pagado&quot;</font>&nbsp;<font color = "silver">*</font>&nbsp;<font color = "maroon">&quot;Cant_Producto_Pagado&quot;</font><font color = "maroon">)</font>&nbsp;<font color = "silver">/</font>&nbsp;<font color = "#FF0080"><b>SUM</b></font><font color = "maroon">(</font><font color = "maroon">&quot;Cant_Producto_Pagado&quot;</font><font color = "maroon">)</font>&nbsp;<font color = "blue">as</font>&nbsp;<font color = "maroon">int</font><font color = "maroon">)</font>&nbsp;<font color = "blue">as</font>&nbsp;<font color = "maroon">prom</font>
    <br/><font color = "blue">from</font>&nbsp;<font color = "maroon">public</font><font color = "silver">.</font><font color = "maroon">&quot;OrdenDetalleProductos&quot;</font><font color = "silver">,</font><font color = "maroon">public</font><font color = "silver">.</font><font color = "maroon">&quot;Orden&quot;</font>
    <br/><font color = "blue">where</font>&nbsp;<font color = "maroon">&quot;OrdenDetalleProductos&quot;</font><font color = "silver">.</font><font color = "maroon">&quot;Orden_ID&quot;</font>&nbsp;<font color = "silver">=</font>&nbsp;<font color = "maroon">&quot;Orden&quot;</font><font color = "silver">.</font><font color = "maroon">&quot;Orden_ID&quot;</font><font color = "maroon">)</font><font color = "maroon">)</font>
    </span></div>
</div>


<div class="container my-3 border">
    <div><span style="font-family: Courier New; font-size: 10pt;">
    <font color = "blue">select</font>&nbsp;<font color = "maroon">X</font><font color = "silver">.</font><font color = "maroon">totalPorOrden</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">from</font>&nbsp;<font color = "maroon">(</font><font color = "blue">select</font>&nbsp;<font color = "maroon">&quot;OrdenDetalleProductos&quot;</font><font color = "silver">.</font><font color = "maroon">&quot;Orden_ID&quot;</font><font color = "silver">,</font>&nbsp;<font color = "#FF0080"><b>sum</b></font><font color = "maroon">(</font><font color = "maroon">&quot;Cant_Producto_Pagado&quot;</font><font color = "silver">*</font><font color = "maroon">&quot;Precio_Producto_Pagado&quot;</font><font color = "maroon">)</font>&nbsp;<font color = "blue">as</font>&nbsp;<font color = "maroon">totalPorOrden</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">from</font>&nbsp;<font color = "maroon">public</font><font color = "silver">.</font><font color = "maroon">&quot;OrdenDetalleProductos&quot;</font><font color = "silver">,</font><font color = "maroon">public</font><font color = "silver">.</font><font color = "maroon">&quot;Orden&quot;</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">where</font>&nbsp;<font color = "maroon">&quot;OrdenDetalleProductos&quot;</font><font color = "silver">.</font><font color = "maroon">&quot;Orden_ID&quot;</font>&nbsp;<font color = "silver">=</font>&nbsp;<font color = "maroon">&quot;Orden&quot;</font><font color = "silver">.</font><font color = "maroon">&quot;Orden_ID&quot;</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">group</font>&nbsp;<font color = "blue">by</font>&nbsp;<font color = "maroon">&quot;OrdenDetalleProductos&quot;</font><font color = "silver">.</font><font color = "maroon">&quot;Orden_ID&quot;</font><font color = "maroon">)</font><font color = "blue">as</font>&nbsp;<font color = "maroon">X</font>
    <br/><font color = "blue">where</font>&nbsp;<font color = "maroon">x</font><font color = "silver">.</font><font color = "maroon">totalPorOrden</font>&nbsp;<font color = "silver">=</font>&nbsp;<font color = "maroon">(</font><font color = "blue">select</font>&nbsp;<font color = "#FF0080"><b>max</b></font><font color = "maroon">(</font><font color = "maroon">x</font><font color = "silver">.</font><font color = "maroon">totalPorOrden</font><font color = "maroon">)</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">from</font>&nbsp;<font color = "maroon">(</font><font color = "blue">select</font>&nbsp;<font color = "#FF0080"><b>sum</b></font><font color = "maroon">(</font><font color = "maroon">&quot;Cant_Producto_Pagado&quot;</font><font color = "silver">*</font><font color = "maroon">&quot;Precio_Producto_Pagado&quot;</font><font color = "maroon">)</font>&nbsp;<font color = "blue">as</font>&nbsp;<font color = "maroon">totalPorOrden</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">from</font>&nbsp;<font color = "maroon">public</font><font color = "silver">.</font><font color = "maroon">&quot;OrdenDetalleProductos&quot;</font><font color = "silver">,</font><font color = "maroon">public</font><font color = "silver">.</font><font color = "maroon">&quot;Orden&quot;</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">where</font>&nbsp;<font color = "maroon">&quot;OrdenDetalleProductos&quot;</font><font color = "silver">.</font><font color = "maroon">&quot;Orden_ID&quot;</font>&nbsp;<font color = "silver">=</font>&nbsp;<font color = "maroon">&quot;Orden&quot;</font><font color = "silver">.</font><font color = "maroon">&quot;Orden_ID&quot;</font>
    <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color = "blue">group</font>&nbsp;<font color = "blue">by</font>&nbsp;<font color = "maroon">&quot;OrdenDetalleProductos&quot;</font><font color = "silver">.</font><font color = "maroon">&quot;Orden_ID&quot;</font><font color = "maroon">)</font><font color = "blue">as</font>&nbsp;<font color = "maroon">X</font><font color = "maroon">)</font>
    </span></div>
</div>




<div class="container mt-5 mb-3">
    <div class="row">
        <div id="legend">
            <legend class="">Delete</legend>
        </div>
    </div>
</div>

<div class="container my-3 border">
    <div><span style="font-family: Courier New; font-size: 10pt;">
    <font color = "blue">DELETE</font>&nbsp;<font color = "blue">FROM</font>&nbsp;<font color = "maroon">public</font><font color = "silver">.</font><font color = "maroon">&quot;Productos&quot;</font>
    <br/><font color = "blue">WHERE</font>&nbsp;<font color = "maroon">&quot;Prod_ID&quot;</font>&nbsp;<font color = "silver">=</font>&nbsp;<font color = "red">'4559'</font>
    </span></div>
 </div>

<div class="container my-3 border">
    <div><span style="font-family: Courier New; font-size: 10pt;">
    <font color = "blue">DELETE</font>&nbsp;<font color = "blue">FROM</font>&nbsp;<font color = "maroon">public</font><font color = "silver">.</font><font color = "maroon">&quot;Cliente&quot;</font>
    <br/><font color = "blue">WHERE</font>&nbsp;<font color = "maroon">&quot;Cliente_ID&quot;</font>&nbsp;<font color = "silver">=</font><font color = "red">'191851560'</font>
    </span></div>
</div>

<br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br>
