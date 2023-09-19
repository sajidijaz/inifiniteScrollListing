$(document).ready(function () {
	const tableBody = $('#data-table tbody');
	const loading = $('#loading');
	let isLoading = false;
	let isScroll = false;
	let moreDataAvailable = true;
	let filterForm = $('#filterForm').serializeArray();
	let columnName = 'id';
	let sortOrder = 'asc';
	let page = 1;

	function loadData() {
		if (isLoading || !moreDataAvailable) {
			return;
		}
		isLoading = true;
		loading.show();

		let filters = {};
		filterForm.forEach(function (ele) {
			filters[ele['name']] = ele['value'];
		});

		$.ajax({
			url: BASE_URL + `getHouses/?sortBy=${columnName}&sortOrder=${sortOrder}&page=${page}&isScroll=${isScroll}`,
			method: 'POST',
			data: {filters},
			dataType: 'json',
			success: function (data) {
				if (data.rows) {
					tableBody.append(data.rows);
				} else {
					moreDataAvailable = false;
				}
				// Increment the page number for the next request
				page++;
				isLoading = false;
				loading.hide();
			},
			error: function () {
				isLoading = false;
				loading.hide();
			}
		});
		return false;
	}
	loadData();
	$(window).scroll(function () {
		filterForm = $('#filterForm').serializeArray();
		if ($(window).scrollTop() + $(window).height() >= tableBody.height() - 100) {
			isScroll = true;
			loadData();
		}
	});

	$(document).off('click', '#search').on('click', '#search', function () {
		isScroll = false;
		page = 1;
		moreDataAvailable = true; // Reset moreDataAvailable
		tableBody.empty();
		filterForm = $('#filterForm').serializeArray();
		loadData();
		return false;
	});

	$(document).off('click', '.sortable').on('click', '.sortable', function () {
		columnName = $(this).attr('data-columnName');
		const sortEle = $(this).find('i');
		$('.sortable').not(this).find('i').removeClass('fa-sort-desc fa-sort-asc');

		if(sortEle.hasClass('fa-sort-desc')) {
			sortEle.removeClass('fa-sort-desc').addClass('fa-sort-asc');
			sortOrder = "asc";
		} else {
			sortEle.removeClass('fa-sort-asc').addClass('fa-sort-desc');
			sortOrder = "desc";
		}
		isScroll = false;
		page = 1;
		moreDataAvailable = true; // Reset moreDataAvailable
		tableBody.empty();
		loadData();
		return false;
	});

});
