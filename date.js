function dispalytime(){
	const now=new Date()
	const month=(now.getMonth()+1).toString().padStart(2,'0')
	const date=now.getDate().toString().padStart(2,'0')

	const currentTime=`${month}:${date}`
	
	document.getElementById('left-1').innerText=currentTime

}

displaytime()     
