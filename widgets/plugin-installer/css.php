<style>
#plugin-installer-url {
	padding: .5em;
	font-size: 1em;
	line-height: 1.5em;
	font-weight: 400;
	border: 2px solid #ddd;
	background: #fff;
	display: block;
	appearance: none;
	border-radius: 0;
	width: 100%;
	margin-top: .5em;
	margin-bottom: .5em;
}
#plugin-installer-wrap {
	text-align: right;
	display: none;
}
.pi-icon {
	display: flex;
	align-items: center;
	justify-content: center;
	margin-right: .5em;
	margin-left: .5em;
}
.pi-icon .icon {
	top: 0;
}
.pi-icon .fa-warning{
	color: #b3000a;
}

.pi-list {
	margin-bottom: 1em;
}

.pi-list ul {
	list-style: none;
}

.pi-list li:nth-child(even) {
	background: #fafafa;
	border-bottom: 1px solid #eee;
	border-top: 1px solid #eee;
}

.pi-version {
	color: #777;
	font-size: .75em;
	display: inline-block;
	margin-left: .25em;
	vertical-align: baseline;
}

.pi-version:before {
	content: '(';
}

.pi-version:after {
	content: ')';
}

.pi-row {
	display: flex;
	width: 100%;
	align-items: center;
	padding: .25em 0 .25em 0;
}

.pi-name {
	flex: 1;
}

.pi-actions .btn {
	padding: .25em 0;
	border-radius: 0;
	border-style: none;
	width: 2em;
	text-align: center;
	border-radius: 5px;
}

.pi-actions .icon {
	top: 0;
}

.pi-actions .btn-repo {
	border-color: #0366d6;
	color: #0366d6;
}

.pi-name a {
	color: #0366d6;
}

.pi-actions .btn:hover,
.pi-actions .btn:focus {
	color: #fff !important;
	background: #000 !important;
}

.pi-actions .btn-repo:hover,
.pi-actions .btn-repo:focus {
	color: #fff !important;
	background: #0366d6 !important;
}

.pi-actions .btn-negative:hover,
.pi-actions .btn-negative:focus {
	color: #fff !important;
	background: #b3000a !important;
}

.pi-actions .pi-btn-disabled:hover {
	background: none !important;
}

.pi-disabled .pi-name {
	opacity: .5;
	font-style: italic;
}
</style>