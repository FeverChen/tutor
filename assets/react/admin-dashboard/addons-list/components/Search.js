import React, { useCallback, useState } from 'react';
import { useAddonsUpdate } from '../context/AddonsContext';
const { __ } = wp.i18n;

const debounce = (fn, delay = 500) => {
	let timer = null;
	return function() {
		const context = this,
			args = arguments;
		clearTimeout(timer);
		timer = setTimeout(() => {
			fn.apply(context, args);
		}, delay);
	};
};

const Search = () => {
	const { filterAddons } = useAddonsUpdate();
	const [search, setSearch] = useState('');
	const setDebouncedSearch = useCallback(
		debounce((value) => {
			filterAddons(value);
		}),
		[]
	);

	const handleChange = (e) => {
		const { value } = e.target;
		setSearch(value);
		setDebouncedSearch(value);
	};

	return (
		<div className="tutor-addons-list-select-filter tutor-d-flex tutor-justify-content-end tutor-align-items-center">
			<div className="tutor-input-group tutor-form-control-has-icon tutor-form-control-has-icon-right-">
				<span className="tutor-icon-search-filled tutor-input-group-icon"></span>
				<input
					type="search"
					className="tutor-form-control"
					placeholder={__('Search…', 'tutor')}
					value={search}
					onChange={handleChange}
				/>
			</div>
		</div>
	);
};

export default Search;
