const $ = (el, forceArray) => {
	const ele = document.querySelectorAll(el);
	return (ele.length === 1 && !forceArray ? ele[0] : ele);
};

const displayModal = (e) => {
	let id = e.currentTarget.getAttribute("data-id");
	$("#modal").classList.toggle("toggle-display-flex");
	document.body.classList.toggle("toggle-overflow");
	testFilesOrFolder(id);
	//displayJSON(id);
};

const closeModal = () => {
	$("#modal").classList.toggle("toggle-display-flex");
	document.body.classList.toggle("toggle-overflow");

	while($(".modalgrid").lastChild){
		$(".modalgrid").removeChild($(".modalgrid").lastChild);
	}
	$(".modalgrid").id = "";
	$(".modalgrid").style = "";
	$("#modalh2").innerHTML = "";

	if(!!document.querySelector(".modalpagination"))
		$(".modalpagination").remove();

	if(!!document.querySelector(".gridpagwrap")){
		$(".wrapper").appendChild($(".modalgrid"));
		$(".wrapper").removeChild($(".gridpagwrap"));
	}
};

const ajax = (o) => {
	let xhr = new XMLHttpRequest();

	if(o.events){
		//loadstart, load, loadend, progress (upload/download only), error, abort
		for(let [key, value] of Object.entries(o.events)){
			xhr.addEventListener(key, value);
		}
	}

	xhr.onreadystatechange = function(){
		if(o.progress)
			o.progress((this.readyState*25));
		if(this.readyState === XMLHttpRequest.DONE){
			let callback = (response) =>{
				console.log(response);
			};

			switch(Math.floor(xhr.status/100)){
				case 1:
				case 2:
				case 3:
					callback = o.success || function(){};
					break;
				case 4:
				case 5:
					callback = o.error || callback;
					break;
				default:
					break;
			}
			let response = (xhr.responseType === "text" ? xhr.responseText : xhr.response);

			if(typeof response == 'string' && (response.charAt(0) === "[" || response.charAt(0) === "{"))
				response = JSON.parse(response);

			callback(response);

			if(o.download || o.preview){
				function download(blob){
					let a = document.createElement('a');
					let url = window.URL.createObjectURL(blob);
					a.href = url;
					if(o.download)
						a.download = o.download;
					if(o.preview)
						a.setAttribute("target", "_blank");
					document.body.append(a);
					a.click();
					a.remove();
					window.URL.revokeObjectURL(url);
				}
				download(response);
			}


			if(o.complete)
				o.complete(response);
		}
	};

	if(o.data) {
		var params = typeof o.data == 'string' || o.noEncoding === true || o.isFile === true
			? o.data
			: Object.keys(o.data).map(function (k) {
				return (!o.data.length
						? encodeURIComponent(k) + '=' + encodeURIComponent(o.data[k])
						: encodeURIComponent(Object.keys(o.data[k])) + '=' + encodeURIComponent(Object.values(o.data[k]))
				);
			}).join('&');
	}

	o.method = (o.method ? o.method : "GET");
	xhr.open(o.method, (o.url === undefined ? "/" : o.method === "GET" && o.data !== undefined ? (o.url+"?"+params) : o.url), o.async || true);

	if(o.method !== "GET" && o.useContentType !== false && o.isFile !== true)
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

	if(o.async !== false)
		xhr.responseType = o.responseType || "text";

	if(o.mimeType)
		xhr.overrideMimeType(o.mimeType);

	if(o.headers)
		for(let [key, value] of Object.entries(o.headers)){
			xhr.setRequestHeader(key, value);
		}

	xhr.send(params);
};


/*^^^^GENERAL FUNCTIONS^^^^*/

const tnoverlay = () => {
	let tnwrapper = document.querySelectorAll(".tnwrapper") || null;
	let previewwrapper = document.querySelectorAll(".previewwrapper") || null;

	for(let x of (tnwrapper.length ? tnwrapper : previewwrapper)){
		x.addEventListener("mouseenter", function(e){
			e.currentTarget.children[0].style.opacity = "1";
		});
		x.addEventListener("mouseleave", function(e){
			e.currentTarget.children[0].style.opacity = "0";
		});
	}
};

const testFilesOrFolder = (id) =>{
	$(".lds-ellipsis").style.display = "inline-block";
	//displayJSON(id);
	ajax({
		url: "handler.php",
		data: {action:"fileorfolder", folderid:id},
		success: function(r) {
							let type = r.substring(0, r.indexOf("<"));
							r = r.substring(r.indexOf("s")+1);
							$(".modalgrid").id = (type === "files" ? "modalfilegrid" : "modalfoldergrid");
							$(".wrapper").id = (type === "files" ? "filewrapper" : "folderwrapper");
							$(".modalgrid").innerHTML = r || "<p class='nores'>No resources found.</p>";
							$(".lds-ellipsis").style.display = "none";
							document.querySelector("#modalh2").innerHTML = "Resources";

							if (type === "folders"/* && window.innerWidth < 1060*/)
								folderPaginationSetup();
/*							else if(!!document.querySelector("#modalfoldergrid")){
								let x = $("#modalfoldergrid").childElementCount || 1;
								$("#modalfoldergrid").style.width = ((x * 530)) + "px";
							}*/

							let thumbNail = document.querySelectorAll(".fileimg");
							let overlay = document.querySelectorAll(".tnoverlay");
							for(let [i, x] of document.querySelectorAll(".dlwrapper").entries()){
								x.children[0].addEventListener("click", function(e){dlIcon(e);});
								x.children[1].addEventListener("click", function(e){dlIcon(e, true);});

								overlay[i].addEventListener("click", function(e){dlIcon(e, true);});
							}
							tnoverlay();
		}
	});
};

const dlIcon = (e, previewOnly) => {

	let x = e.currentTarget;
	let y = null;
	let params = "";
	let initialIcon = "";

	if(!x.classList.contains("tnoverlay")) {
		y = x.children[0] || x;
		initialIcon = y.innerHTML;
	}

	if(y) {
		y.innerHTML = "loop";
		y.classList.toggle("rotate");
		params = x.closest(".dlwrapper").getAttribute("data-params");
	}else {
		if(x.closest(".previewwrapper") === null)
			x.nextElementSibling.classList.toggle("contrast");
		else
			x.parentElement.classList.toggle("contrast");

		params = x.getAttribute("data-params");
	}
	x.style.pointerEvents = "none";

	ajax({
		url: "handler.php?"+params,
		responseType: "blob",
		isFile: true,
		download: (previewOnly ? null : new URLSearchParams(params).get("name")),
		preview: (previewOnly ? true : null),
		success: function(){
			if(y) {
				y.classList.toggle("rotate");
				y.innerHTML = initialIcon;
			}else {
				if(x.nextElementSibling !== null)
					x.nextElementSibling.classList.toggle("contrast");
				else
					x.parentElement.classList.toggle("contrast");
			}

			x.style.pointerEvents = "auto";
		}
	});
};

for(let x of $(".griditem", true)){
	x.addEventListener("click", displayModal);
}

$(".modalclose").addEventListener("click", closeModal);

const displayJSON = (id) =>{
	ajax({
	url: "handler.php",
	data: {folderid: id, action: "displayResults"},
		success: function(r){
			console.log(r);
		}
});
};

const folderPaginationSetup = () => {
	let pagwrap = document.createElement("div");
	pagwrap.className = "gridpagwrap";
	pagwrap.appendChild($("#modalfoldergrid"));
	$("#folderwrapper").appendChild(pagwrap);
	let grid = $("#modalfoldergrid");

	let d = grid.childElementCount/(window.innerWidth <= /*768*/1120 ? 1 : 2);

	grid.style.width = (d*100) + "%";
	grid.setAttribute("data-index", "0");

		modalPagination(d);
};

const modalPagination = (d) => {
	let modal = $("#folderwrapper");
	let parent = document.createElement("div");
	parent.className = "modalpagination";
	let grid = document.querySelector("#modalfoldergrid");
	grid.setAttribute("data-index", "0");
	let chevronL = document.createElement("i");
	chevronL.className = "material-icons chevronarrow";
	chevronL.innerHTML = "chevron_left";

	parent.appendChild(chevronL);

		for (let i = 0; i < d; i++) {
			let div = document.createElement("div");
			div.className = (i === 0 ? "pag pag-active" : "pag");
			div.addEventListener("click", function () {
				let grid = $("#modalfoldergrid");
				grid.style.left = "-" + (i * 100) + "%";
				grid.setAttribute("data-index", i);
				for (let x of document.querySelectorAll(".pag-active")) {
					x.classList.remove("pag-active");
				}
				div.classList.add("pag-active");
			});

			if (d > 6 && (i >= 3 && i < d - 3)) {
				div.style.display = "none";
				if (i === Math.floor(d / 2)) {
					let ellip = document.createElement("span");
					ellip.innerHTML = "...";
					ellip.classList.add("ellip");
					parent.appendChild(ellip);
				}
			}
			parent.appendChild(div);
		}

		let chevronR = document.createElement("i");
		chevronR.className = "material-icons chevronarrow";
		chevronR.innerHTML = "chevron_right";
		parent.appendChild(chevronR);

		modal.appendChild(parent);
		parent.style.display = (d === 1 ? "none" : "flex");

		Array.from(document.querySelectorAll(".chevronarrow")).forEach((v) => {
			v.addEventListener("click", function (e) {
				let ind = parseInt(grid.getAttribute("data-index"));
				let x = 0;
				let pag = document.querySelectorAll(".pag");
				if (e.currentTarget.innerHTML === "chevron_left") {
					if ((ind - 1) !== -1) {
						grid.style.left = "-" + (ind - 1) + "00%";
						x = (ind - 1);
						grid.setAttribute("data-index", x);
					}
				} else {
					if ((ind + 1) !== Math.ceil(d)) {
						grid.style.left = "-" + (ind + 1) + "00%";
						x = (ind + 1);
						grid.setAttribute("data-index", x);
					} else
						x = ind;
				}
				for (let i of document.querySelectorAll(".pag-active")) {
					i.classList.remove("pag-active");
				}
				//if(x < 6)
				pag[x].classList.add("pag-active");
			});
		});
};

const partnerSearch = (event) => {
	event.preventDefault();
	let q = event.target[0].value.toLowerCase().replace(/[^a-z\d.]/g, "");

		let match = partners.filter(p => q === p)[0];
		if(match){
			window.location = `https://cloud.precisionplanting.com/partners/${match}`;
		}else{
			if(event.target.lastChild.tagName !== "P") {
				let p = document.createElement("p");
				p.innerHTML = "We couldn't find a match, please try again.";
				p.style.color = "red";
				p.style.marginTop = "10px";
				event.target.appendChild(p);
			}
		}
};

var partners = [];

if(window.location.href.split("/partners/")[1] === "") {
	ajax({
		url: "handler.php",
		data: {action: "partners"},
		success: function(r){
			partners = Object.keys(r);
		}
	});

	$(".partnersearch", false).addEventListener("submit", partnerSearch);
}

const lineheight = () => {
	let l = $(".heroanimation");
	let b = $("#herobubble");
	let h = $(".hero");
	let cir = $(".cir");
	let cirlogo = $(".cirlogo");
	l.style.height = (cir.offsetTop+(h.clientHeight - (b.offsetTop + b.clientHeight)) + (cirlogo.clientHeight/2))+"px";
};

lineheight();

window.addEventListener("resize", lineheight);
