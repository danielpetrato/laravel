Hello World!!! 
<br/>
{{$nome}}
{{$variavel1}}
<br/> 
{{$variavel1 .''. $nome}}
<br/> 
{{2+2}}
<br/> 
{{isset($test)?$test:"outro valor"}}
<br/> 
{{$test??"outro valor"}}
<br/> 
{{$test ?? "outro valor"}} //operador OR foi descontinuado na versao 5.5 do laravel
<br/> 
{{ $test ? $test : "outro valor" }}// para a versao do php menor que 7
<br/> 
{{"<h1>Teste h1</h1>"}}
<br/> 
<br/> 
<br/> 
{!!"<h1>Teste h1</h1>"!!}