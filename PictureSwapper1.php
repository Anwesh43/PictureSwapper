<?php
if(isset($_POST['submit']))
{
$a=$_FILES["filer"]["name"];
	$b=$_FILES["filer"]["tmp_name"];
	$c=getcwd().'/'.$a;
	
	move_uploaded_file($b,$c);
echo "
<script>
var obj,ctx;
var loaded=0;
var x=new Array(9),y=new Array(9),x2,y2;
var x1=new Array(9),y1=new Array(9);
var isd=0;
var tt=0;
var j=0;
var e=0;
var n1=0;
var r=new Image();
window.onload=function()
{
	obj=document.getElementById('tik');
	ctx=obj.getContext('2d');
	for(var i=0;i<9;i++)
	{
		x1[i]=(i%3)*200;
		
		y1[i]=Math.floor(i/3)*200;
	
		
		assign(i,1);
		
	}
	r.src='".$a."';
	r.onload=function()
	{
	
		
		pop();
	};
};
function show()
{
	ctx.drawImage(r,0,0,600,600);
	loaded=1;
}
function assign(n,e)
{
	var rx=Math.floor(Math.random()*3)*200;
	var ry=Math.floor(Math.random()*3)*200;
	var s=0;
	
	for(var i=0;i<n;i++)
	{
		if(x[i]==rx && y[i]==ry)
		{
			e=-1;
			assign(n,e);
		}
		else
		{
			s++;
			e=1;
		}
	}
	if(e==1 && s==n)
	{
		
		x[n]=rx;
		y[n]=ry;
	}
}
window.onmousedown=function(event)
{
if(isd==0)
{
var x1=event.pageX;
var y1=event.pageY;
	for(var i=0;i<9;i++)
	{
		if(x1>x[i] && x1<x[i]+200 && y1>y[i] && y1<y[i]+200)
		{
			x2=x[i];
			y2=y[i];
			j=i;
			isd=1;
			break;
		}
	}
}
};
window.onmousemove=function(event)
{
	if(isd==1)
	{
		x[j]=event.pageX;
		y[j]=event.pageY;
		for(var i=0;i<9;i++)
		{
		if(i!=j)
		{
		if(x[j]+200>x[i] && x[j]<x[i]+200 && y[j]+200>y[i] && y[j]<y[i]+200)
		{
			n1=i;
		}
		}
		}
	}
};
window.onmouseup=function(event)
{
	if(isd==1)
	{
		for(var i=0;i<9;i++)
		{
		if(i!=j)
		{
		if(x[j]>x[i] && x[j]<x[i]+200 && y[j]>y[i] && y[j]<y[i]+200)
		{
			var tx=x2;
			var ty=y2;
			x[j]=x[i];
			x[i]=tx;
			y[j]=y[i];
			y[i]=ty;
			isd=0;
		}
		}
		}
	}
};
function pop()
{

	
	ctx.clearRect(0,0,1000,600);
	var st=0;
	ctx.lineWidth=10;
	for(var i=0;i<9;i++)
	{
		ctx.save();
		ctx.translate(x[i]-x1[i],y[i]-y1[i]);
		if(i!=j && tt!=9)
			ctx.globalAlpha=0.5;
		else
			ctx.globalAlpha=1;
		if(i!=n1)
		ctx.strokeStyle='black';
		else
		ctx.strokeStyle='blue';
		ctx.beginPath();
		ctx.rect(x1[i],y1[i],200,200);
		ctx.clip();
		if(tt!=9)
		ctx.stroke();
		ctx.drawImage(r,0,0,600,600);
		ctx.restore();
		if(isd==0)
		{
			if(x1[i]==x[i] && y[i]==y1[i])
				st++;
		}
	}
	tt=st;
	
	setTimeout('pop()',100);

}
</script>
<canvas id='tik' width='1000px' height='600px'>
</canvas>";
}

?>
<link href='Styler.css' rel="Stylesheet">
<form action="PictureSwapper1.php" method="post" enctype="multipart/form-data">


<input type="button" onclick="document.getElementById('filer').click()" id="b1" value="browse">
<input type="file" name="filer" id="filer" style='visibility:hidden'>
</br>
</br>
<input type="submit" name="submit" value="upload" id='sub'>

</form>

</form>
