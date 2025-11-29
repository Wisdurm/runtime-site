$( document ).ready(() => {
	// Allow navbars to be collapsed
	$(".collapse").each((i, nav) => {
		// Collapse button
		let btn = document.createElement("a");
		btn.textContent = "⌄";
		btn.className = "hide";
		btn.onclick = (e) => {
			$($(e.target).closest(".collapse").find("tr")[1]).toggle();
		};
		$(nav).find("td")[0].appendChild(btn);
	});
});

