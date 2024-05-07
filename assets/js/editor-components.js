/**
 * Greyd Block Editor Components.
 * 
 * This file is loaded in the editor.
 */
var greyd = greyd || { tools: {}, components: {} };

( function ( wp ) {

	const _ = lodash;

	if ( !_.has( wp, "editSite" ) ) return null;

	const {
		createElement: el,
		Component
	} = wp.element;

	const {
		BaseControl,
		Icon,
		ColorIndicator,
		PanelBody,
		Tooltip,
		Button,
		FlexItem,
		Popover,
		GradientPicker,
		RangeControl,
		__experimentalHStack: HStack,
		__experimentalUnitControl: UnitControl
	} = wp.components;

	const {
		ColorPalette,
		ContrastChecker,
		__experimentalColorGradientControl: ColorGradientControl
	} = wp.blockEditor;

	const {
		subscribe,
		dispatch,
		select
	} = wp.data;

	const { __ } = wp.i18n;

	if ( typeof greyd.components === 'undefined' ) {
		greyd.components = {};
	}

	/**
	 * DebugControl to print out debug dev infos
	 * 
	 * @property {string} label Label to be displayed.
	 * @property {string} help Help to be displayed.
	 * @property {string} className Class of Select.
	 * @property {string|object} value Value to be printed.
	 * @property {callback} onChange Callback function to be called when text of value is changed.
	 * 
	 * @returns {object} DebugControl component.
	 */
	greyd.components.DebugControl = class extends Component {
		constructor () {
			super();
		}
		render() {
			var value = this.props.value;
			if ( typeof value !== 'string' ) value = JSON.stringify( value, null, 4 );
			return el( BaseControl, {
				className: this.props.className,
				help: _.has( this.props, 'help' ) ? this.props.help : '',
			},
				( _.has( this.props, 'label' ) ) ? el( 'label', {}, this.props.label ) : '',
				el( 'pre', {
					contenteditable: _.has( this.props, 'onChange' ) ? 'true' : undefined,
					className: "panel_debug",
					onInput: ( event ) => {
						this.props.onChange( event.target.textContent );
					},
				}, value ),
			);
		}
	};


	/**
	 * Render a simple Icon.
	 * 
	 * @property {string} icon Greyd icon name or dashicon name.
	 * @property {string} title Optional icon title
	 * 
	 * @returns {object} Icon component.
	 */
	greyd.components.Icon = class extends Component {
		constructor () {
			super();

			this.icons = {
				hover: '<svg width="20" height="20" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M4.20822 1.50747C4.083 1.52623 4.00112 1.57262 3.97018 1.60198C3.93109 1.63906 3.8689 1.75235 3.84269 1.97616C3.81888 2.17943 3.83458 2.39487 3.86428 2.54217C3.90523 2.70132 3.94469 2.91794 3.97963 3.10974C3.98431 3.13546 3.98891 3.16072 3.99343 3.18535C4.038 3.42848 4.07245 3.59837 4.09778 3.67047C4.10497 3.69093 4.11083 3.71185 4.1153 3.73307C4.15393 3.91631 4.19249 4.06288 4.23398 4.22033L4.23474 4.22322C4.27513 4.37647 4.31828 4.54021 4.36142 4.74314C4.3849 4.8305 4.4055 4.88671 4.43276 4.96109C4.44414 4.99214 4.45668 5.02635 4.47108 5.06732C4.5199 5.20626 4.56726 5.36555 4.61255 5.61763C4.72511 6.04941 4.80704 6.51361 4.86964 6.86832C4.89736 7.02538 4.92129 7.16097 4.94242 7.26277C4.96012 7.33042 4.98327 7.4243 4.98738 7.50619C4.9886 7.53042 4.99035 7.58607 4.97588 7.65261C4.96507 7.70227 4.91776 7.88762 4.71959 7.99388C4.50614 8.10833 4.31361 8.03011 4.25343 8.00017C4.18482 7.96604 4.13911 7.92389 4.12186 7.90752C4.06424 7.85287 4.01214 7.77727 3.99023 7.74549C3.98877 7.74337 3.98744 7.74144 3.98626 7.73973C3.97128 7.71811 3.95807 7.69876 3.94491 7.67948C3.93247 7.66126 3.92008 7.6431 3.90626 7.62313C3.8117 7.52764 3.7567 7.44937 3.71531 7.39047L3.7147 7.3896C3.67862 7.33826 3.65994 7.31193 3.61376 7.26811C3.514 7.17348 3.3979 7.04128 3.30201 6.93209L3.29188 6.92057C3.195 6.81028 3.11612 6.72105 3.05587 6.66079C3.04642 6.65405 3.03703 6.64735 3.02768 6.64067C2.87401 6.53095 2.7333 6.43048 2.58692 6.35008C2.42145 6.25921 2.30136 6.22493 2.21582 6.22493C1.83379 6.22493 1.58066 6.485 1.54691 6.6771C1.54449 6.69086 1.5415 6.7045 1.53795 6.718C1.49998 6.86206 1.49815 6.91138 1.50069 6.94031C1.5026 6.96207 1.5098 7.00437 1.55906 7.104C1.63947 7.20231 1.76022 7.3393 1.90226 7.50044C1.9755 7.58352 2.0544 7.67302 2.13635 7.76696C2.37511 8.04065 2.64692 8.3601 2.79739 8.59466C3.05663 8.96451 3.24952 9.29638 3.40362 9.56247C3.56827 9.84678 3.66755 10.016 3.75863 10.1234C3.81065 10.1848 3.89236 10.2376 4.04701 10.3088C4.06591 10.3175 4.08851 10.3274 4.11389 10.3385C4.24387 10.3956 4.44683 10.4847 4.59929 10.605C4.86961 10.8181 5.32695 11.2641 5.56774 11.5221C5.84095 11.8148 5.89613 12.2134 5.90456 12.4726C6.03118 12.4755 6.1601 12.4791 6.28823 12.4826C6.44799 12.487 6.60651 12.4914 6.75777 12.4946C7.23069 12.5046 7.62724 12.5028 7.87256 12.4695C7.884 12.468 7.89547 12.4668 7.90698 12.4661C7.91215 12.4634 7.91943 12.4593 7.9289 12.4532C7.97086 12.4263 8.02748 12.3786 8.09332 12.3083C8.22579 12.167 8.34572 11.9879 8.40989 11.8662C8.4198 11.8474 8.43091 11.8292 8.44313 11.8118C8.59432 11.5967 8.83925 11.4221 9.14334 11.4176C9.46229 11.413 9.7195 11.5972 9.86528 11.8482C9.92403 11.9494 10.0323 12.1197 10.1565 12.2677C10.2185 12.3416 10.2762 12.3999 10.3256 12.4398C10.3609 12.4683 10.3805 12.478 10.3844 12.48C10.449 12.494 10.557 12.5005 10.6859 12.4998C10.6793 12.4202 10.675 12.3375 10.675 12.2567C10.675 12.2238 10.6745 12.19 10.674 12.1557C10.6728 12.0669 10.6715 11.9749 10.6783 11.8866C10.6888 11.7508 10.7168 11.6022 10.7696 11.3622C10.8483 11.0051 11.0853 10.6535 11.2891 10.3915C11.5049 10.1142 11.7435 9.86353 11.8914 9.70833C12.1034 9.48582 12.2571 9.10299 12.3595 8.79412C12.3923 8.69505 12.4296 8.48408 12.4583 8.2279C12.4858 7.98172 12.5 7.74363 12.5 7.61364V5.80362C12.5 5.61914 12.4504 5.55193 12.4316 5.53146C12.41 5.50802 12.3676 5.4804 12.2831 5.47174C12.1958 5.4628 12.0897 5.4783 11.9923 5.51704C11.8897 5.55784 11.8423 5.60551 11.8329 5.61893C11.7924 5.6766 11.7486 5.77763 11.7089 5.89068C11.6999 5.91623 11.6919 5.94017 11.6844 5.96277C11.6833 5.96601 11.6822 5.96939 11.681 5.97287C11.675 5.99096 11.6681 6.01174 11.6622 6.0284C11.6587 6.0384 11.6533 6.05364 11.6466 6.06984C11.644 6.07652 11.6239 6.12719 11.5879 6.17841C11.5763 6.19494 11.5541 6.22466 11.5204 6.2563C11.4912 6.28378 11.421 6.34384 11.3105 6.37441C11.1762 6.41157 11.0238 6.39274 10.8965 6.30667C10.7912 6.23551 10.7424 6.14482 10.7232 6.10382C10.699 6.05223 10.6877 6.00441 10.6824 5.97357C10.6538 5.85399 10.625 5.68377 10.5979 5.52385C10.5833 5.43737 10.5692 5.35391 10.5559 5.28309C10.5322 5.15744 10.508 5.0469 10.4818 4.95816C10.4596 4.88323 10.4431 4.84877 10.4388 4.83971C10.4374 4.83678 10.4373 4.83651 10.4386 4.83839C10.3874 4.76787 10.3358 4.72595 10.2894 4.698C10.241 4.66889 10.189 4.64936 10.1299 4.63311C9.95662 4.58546 9.73587 4.58211 9.57661 4.6299C9.57664 4.62989 9.57625 4.63001 9.57543 4.63029L9.57189 4.63155C9.56877 4.6327 9.56455 4.63436 9.55925 4.63664C9.5485 4.64126 9.53495 4.64771 9.5191 4.65619C9.48698 4.67336 9.45102 4.69586 9.41597 4.72174C9.38066 4.74781 9.35113 4.77372 9.32937 4.79639C9.30964 4.81694 9.30278 4.82809 9.30271 4.82804C9.3027 4.82803 9.30289 4.82769 9.30325 4.827C9.26508 4.89942 9.22975 5.04269 9.19559 5.27232C9.18911 5.31586 9.18244 5.36503 9.17535 5.41726C9.15261 5.58482 9.12558 5.78404 9.08685 5.93104L9.05667 5.92309C8.93388 6.03759 8.56466 6.26201 8.1694 6.05631C8.13265 5.9766 8.10796 5.87575 8.10603 5.85975L8.10431 5.83915L8.10389 5.83145L8.10362 5.82498L8.10342 5.8182L8.10293 5.79988C8.10239 5.78208 8.10127 5.75109 8.09896 5.70996C8.0943 5.62708 8.08495 5.50545 8.06644 5.36932C8.02564 5.0694 7.95302 4.80347 7.86244 4.67457C7.82273 4.61806 7.67979 4.51813 7.50917 4.48377C7.34095 4.44989 7.1935 4.46496 7.08577 4.51909C6.90623 4.60929 6.80331 4.74142 6.75973 4.84818C6.7437 4.92679 6.73923 5.06577 6.74893 5.26817C6.75181 5.32818 6.75644 5.39929 6.76128 5.47366C6.77055 5.61624 6.78061 5.77083 6.78061 5.88232C6.78061 6.15846 6.55676 6.38232 6.28061 6.38232C6.00447 6.38232 5.78061 6.15846 5.78061 5.88232C5.78061 5.88316 5.78072 5.88385 5.78061 5.88232C5.78025 5.87707 5.77874 5.85596 5.77354 5.81482C5.76753 5.76726 5.75829 5.70566 5.74589 5.63097C5.72113 5.48185 5.68591 5.29305 5.64479 5.08337C5.56264 4.66449 5.45972 4.17624 5.37659 3.78197C5.37395 3.76945 5.3718 3.75683 5.37012 3.74414C5.29317 3.16009 5.13934 2.65251 4.99034 2.29916C4.98639 2.28977 4.98272 2.28026 4.97934 2.27065C4.94736 2.17963 4.87957 2.01866 4.77962 1.86064C4.68199 1.70627 4.57618 1.59053 4.47494 1.52704C4.41656 1.50421 4.32111 1.49056 4.20822 1.50747ZM6.3962 3.77085C6.38344 3.71021 6.37099 3.65113 6.35897 3.59413C6.27014 2.93407 6.09656 2.35245 5.9175 1.92425C5.86517 1.77847 5.7687 1.55367 5.62477 1.32611C5.47928 1.09607 5.26 0.822731 4.95181 0.647308C4.94101 0.641161 4.92998 0.635418 4.91875 0.630091C4.64303 0.499306 4.33078 0.477957 4.06009 0.518504C3.79127 0.558769 3.49985 0.669767 3.28194 0.876498C2.9892 1.1542 2.88548 1.55244 2.84948 1.85983C2.81164 2.18289 2.83607 2.51288 2.88795 2.75892C2.88966 2.76705 2.89158 2.77515 2.8937 2.78319C2.92526 2.90294 2.95834 3.08401 2.99638 3.29221C3.00079 3.31635 3.00527 3.34085 3.00982 3.36567C3.04561 3.5609 3.09021 3.80273 3.14279 3.96746C3.18485 4.16345 3.22686 4.32285 3.26624 4.47229L3.26699 4.47516C3.30849 4.63261 3.34704 4.77918 3.38567 4.96241C3.38739 4.97055 3.38931 4.97864 3.39143 4.98668C3.42919 5.12997 3.47122 5.2444 3.50335 5.33187C3.51232 5.35628 3.52051 5.37858 3.52763 5.39883C3.56043 5.4922 3.59478 5.60344 3.63133 5.81145C3.63352 5.82393 3.63619 5.83633 3.63933 5.84862C3.62995 5.84192 3.62038 5.83507 3.61062 5.82808C3.46222 5.72186 3.27054 5.58465 3.06831 5.47358C2.83974 5.34804 2.54506 5.22493 2.21582 5.22493C1.44423 5.22493 0.708919 5.74139 0.566117 6.4817C0.523185 6.64739 0.486983 6.82813 0.504524 7.02782C0.523111 7.23942 0.597206 7.42497 0.695084 7.61068C0.709386 7.63782 0.726155 7.66358 0.745179 7.68764C0.841272 7.80919 1.00526 7.99524 1.17723 8.19034C1.24575 8.26807 1.31553 8.34724 1.38279 8.42434C1.63806 8.71695 1.85923 8.98205 1.95916 9.14004C1.96349 9.14689 1.96799 9.15363 1.97264 9.16026C2.20782 9.49492 2.38381 9.79692 2.53826 10.0636C2.54604 10.0771 2.55383 10.0905 2.56164 10.104C2.69953 10.3424 2.84176 10.5883 2.99575 10.77C3.19752 11.008 3.45126 11.1354 3.62901 11.2172C3.68584 11.2434 3.73292 11.2645 3.77253 11.2822C3.884 11.3322 3.9363 11.3557 3.9801 11.3902C4.19299 11.5581 4.61084 11.9624 4.83666 12.2044C4.85998 12.2294 4.90471 12.334 4.90585 12.5461C4.90632 12.6349 4.89903 12.7178 4.89134 12.779C4.88755 12.8092 4.88383 12.8329 4.88126 12.8479L4.87848 12.8636C4.87839 12.864 4.87814 12.8653 4.87806 12.8657C4.84835 13.0125 4.88593 13.1648 4.98053 13.2809C5.07548 13.3974 5.21781 13.465 5.36811 13.465C5.63511 13.465 5.93206 13.4732 6.24011 13.4817C6.40346 13.4863 6.56992 13.4909 6.7367 13.4944C7.18472 13.5038 7.64615 13.5058 7.97967 13.464C8.17902 13.4542 8.3478 13.3726 8.46899 13.2948C8.60331 13.2086 8.72297 13.0989 8.82304 12.9921C8.94411 12.8629 9.0545 12.7185 9.14532 12.5818C9.21427 12.6848 9.2976 12.7999 9.39046 12.9105C9.47763 13.0144 9.58145 13.1243 9.69779 13.2181C9.80976 13.3085 9.96238 13.4077 10.1471 13.4515C10.389 13.5089 10.702 13.5037 10.9083 13.4939C11.021 13.4886 11.1219 13.4806 11.1945 13.474C11.2309 13.4707 11.2606 13.4676 11.2816 13.4654L11.3064 13.4627L11.3135 13.4619L11.3156 13.4616L11.3167 13.4615C11.4561 13.445 11.5823 13.3706 11.6641 13.2565C11.746 13.1425 11.7761 12.9993 11.7472 12.8619L11.7468 12.8599L11.7447 12.8497C11.7428 12.8402 11.74 12.8258 11.7365 12.8071C11.7296 12.7698 11.7202 12.7165 11.7109 12.6544C11.6915 12.5257 11.675 12.3772 11.675 12.2567C11.675 12.1756 11.6741 12.1238 11.6734 12.0859C11.6725 12.0321 11.672 12.0063 11.6753 11.9637C11.6799 11.9048 11.6934 11.8172 11.7462 11.5773C11.7732 11.4545 11.8852 11.2539 12.0784 11.0056C12.2596 10.7727 12.4659 10.5551 12.6154 10.3981C12.9982 9.99634 13.2076 9.41364 13.3086 9.10883C13.3775 8.90106 13.4232 8.59766 13.4521 8.33891C13.4821 8.07016 13.5 7.79275 13.5 7.61364V5.80362C13.5 5.42892 13.3932 5.09957 13.1674 4.85425C12.9443 4.61189 12.6537 4.50447 12.385 4.47694C12.119 4.44971 11.8514 4.49689 11.6227 4.58782C11.562 4.61198 11.5007 4.64058 11.4405 4.67382C11.4032 4.54767 11.3453 4.38506 11.2476 4.25057C10.9716 3.87069 10.628 3.73295 10.395 3.6689C10.0688 3.57919 9.65443 3.5625 9.28919 3.6721C9.12935 3.72007 8.96038 3.81509 8.82202 3.91723C8.76826 3.95692 8.70941 4.00479 8.65164 4.06023C8.4213 3.76109 8.03842 3.57028 7.70661 3.50345C7.38794 3.43927 6.99894 3.44359 6.63683 3.62553C6.55106 3.66862 6.47076 3.71738 6.3962 3.77085ZM7.89728 12.4705C7.89728 12.4705 7.89762 12.4704 7.89831 12.4702Z"/></svg>',
				mobile: '<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M6.93929 4.28575C6.68939 4.28575 6.42857 4.50863 6.42857 4.85718V15.1429C6.42857 15.4914 6.68939 15.7143 6.93929 15.7143H13.0643C13.3142 15.7143 13.575 15.4914 13.575 15.1429V4.85718C13.575 4.50863 13.3142 4.28575 13.0643 4.28575H6.93929ZM5 4.85718C5 3.78556 5.83608 2.85718 6.93929 2.85718H13.0643C14.1675 2.85718 15.0036 3.78556 15.0036 4.85718V15.1429C15.0036 16.2145 14.1675 17.1429 13.0643 17.1429H6.93929C5.83608 17.1429 5 16.2145 5 15.1429V4.85718Z"/><path fill-rule="evenodd" clip-rule="evenodd" d="M9.2876 13.5715C9.2876 13.177 9.60739 12.8572 10.0019 12.8572H10.009C10.4035 12.8572 10.7233 13.177 10.7233 13.5715C10.7233 13.966 10.4035 14.2857 10.009 14.2857H10.0019C9.60739 14.2857 9.2876 13.966 9.2876 13.5715Z"/></svg>',
				tablet: '<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M4.28599 3.71418C4.28599 3.33951 4.67963 2.85704 5.40321 2.85704H14.5607C15.2843 2.85704 15.6779 3.33951 15.6779 3.71418V16.2856C15.6779 16.6603 15.2843 17.1428 14.5607 17.1428H5.40321C4.67963 17.1428 4.28599 16.6603 4.28599 16.2856V3.71418ZM5.40321 1.42847C4.10376 1.42847 2.85742 2.3531 2.85742 3.71418V16.2856C2.85742 17.6467 4.10376 18.5713 5.40321 18.5713H14.5607C15.8602 18.5713 17.1065 17.6467 17.1065 16.2856V3.71418C17.1065 2.3531 15.8602 1.42847 14.5607 1.42847H5.40321ZM9.98196 14.2856C9.58747 14.2856 9.26768 14.6054 9.26768 14.9999C9.26768 15.3944 9.58747 15.7142 9.98196 15.7142H9.99089C10.3854 15.7142 10.7052 15.3944 10.7052 14.9999C10.7052 14.6054 10.3854 14.2856 9.99089 14.2856H9.98196Z"/></svg>',
				laptop: '<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M4.28592 3.57139C3.89143 3.57139 3.57164 3.89119 3.57164 4.28568V11.4285C3.57164 11.823 3.89143 12.1428 4.28592 12.1428H15.7145C16.109 12.1428 16.4288 11.823 16.4288 11.4285V4.28568C16.4288 3.89119 16.109 3.57139 15.7145 3.57139H4.28592ZM2.14307 4.28568C2.14307 3.10221 3.10246 2.14282 4.28592 2.14282H15.7145C16.898 2.14282 17.8573 3.10221 17.8573 4.28568V11.4285C17.8573 12.612 16.898 13.5714 15.7145 13.5714H4.28592C3.10246 13.5714 2.14307 12.612 2.14307 11.4285V4.28568Z"/><path fill-rule="evenodd" clip-rule="evenodd" d="M1.42871 15.7143C1.42871 15.3198 1.74851 15 2.143 15H17.8573C18.2518 15 18.5716 15.3198 18.5716 15.7143C18.5716 16.1088 18.2518 16.4286 17.8573 16.4286H2.143C1.74851 16.4286 1.42871 16.1088 1.42871 15.7143Z"/></svg>',
				desktop: '<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M3.14293 2.27281C2.59739 2.27281 2.14293 2.72149 2.14293 3.29013V11.9481C2.14293 12.5168 2.59739 12.9655 3.14293 12.9655H16.8572C17.4028 12.9655 17.8572 12.5168 17.8572 11.9481V3.29013C17.8572 2.72149 17.4028 2.27281 16.8572 2.27281H3.14293ZM0.714355 3.29013C0.714355 1.94608 1.79491 0.844238 3.14293 0.844238H16.8572C18.2052 0.844238 19.2858 1.94608 19.2858 3.29013V11.9481C19.2858 13.2922 18.2052 14.394 16.8572 14.394H3.14293C1.79491 14.394 0.714355 13.2922 0.714355 11.9481V3.29013Z"/><path fill-rule="evenodd" clip-rule="evenodd" d="M5.85693 17.143C5.85693 16.7485 6.17673 16.4287 6.57122 16.4287H13.4284C13.8229 16.4287 14.1427 16.7485 14.1427 17.143C14.1427 17.5375 13.8229 17.8573 13.4284 17.8573H6.57122C6.17673 17.8573 5.85693 17.5375 5.85693 17.143Z"/><path fill-rule="evenodd" clip-rule="evenodd" d="M9.99993 12.9656C10.3944 12.9656 10.7142 13.2854 10.7142 13.6799V17.1431C10.7142 17.5376 10.3944 17.8573 9.99993 17.8573C9.60544 17.8573 9.28564 17.5376 9.28564 17.1431V13.6799C9.28564 13.2854 9.60544 12.9656 9.99993 12.9656Z"/></svg>',
				greyd: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M19.7639 12.7434L22 14.7513C21.3043 16.2413 20.0173 17.1939 19.2619 17.5115L17.0854 15.3717L16.3003 14.2774L17.0755 16.3683L15.7437 17.6923C14.9089 17.3552 14.2877 16.5881 14.084 16.0703L15.4307 14.7464L15.8183 14.2725L6.76431 18L1 12.333C2.8585 8.2732 6.06861 6.28486 8.01159 5.44457L13.7809 11.1165L15.8232 13.9891L13.8157 8.50769L17.3836 5C20.2658 6.30442 21.4087 8.72757 21.7813 9.51409L18.1588 12.7775L16.3053 13.9891L19.7639 12.7434Z"/></svg>'
			};
		}

		render() {
			const svg = _.get( this.icons, this.props.icon );
			return _.isEmpty( svg ) ?
				el( Icon, this.props ) :
				el( "span", { title: this.props.title, dangerouslySetInnerHTML: { __html: svg } } );
		}
	};


	/**
	 * Control for css text-decoration property
	 * 
	 * @property {string} label Optional label to be displayed.
	 * @property {string} value Current value.
	 * @property {object} default var and value of default setup.
	 * @property {callback} onChange Callback function to be called when value is changed.
	 * 
	 * @returns {string} Value in css format. Empty String "" on default or if cleared.
	 */
	greyd.components.TextDecorationControl = class extends Component {
		constructor ( props ) {
			super( props );

			// state
			this.state = {
				value: {
					line: [ "none" ],
					style: "solid",
					color: "",
					thickness: ""
				}
			};
		}
		componentWillMount() {
			this.loadValue( this.props );
		}
		componentWillReceiveProps( props ) {
			this.loadValue( props );
		}

		/**
		 * Load value and mode based on props
		 * @param {mixed} props new props object
		 */
		loadValue( props ) {

			var options = {
				line: [ "none", "underline", "overline", "line-through" ],
				style: [ "solid", "double", "dotted", "dashed", "wavy" ],
			};

			var newValue = { line: [], style: "solid", color: "", thickness: "" };
			var values = props.value;

			// check default
			if ( _.has( props, "default" ) ) {
				if ( values == props.default.var ) {
					values = props.default.value;
				}
			}

			// read css string
			// https://developer.mozilla.org/de/docs/Web/CSS/text-decoration
			var sub_values = values.split( ' ' );
			sub_values.forEach( ( sub ) => {
				if ( options.line.indexOf( sub ) > -1 ) {
					newValue.line.push( sub );
				}
				else if ( options.style.indexOf( sub ) > -1 ) {
					newValue.style = sub;
				}
				else if ( sub.indexOf( '#' ) === 0 || sub.indexOf( 'rgb' ) === 0 || sub.indexOf( 'var(' ) === 0 ) {
					newValue.color = sub;
				}
				else if ( sub.indexOf( 'px' ) > 0 || sub.indexOf( 'em' ) > 0 || sub.indexOf( '%' ) > 0 ) {
					newValue.thickness = sub;
				}
			} );

			// set state
			this.setState( { value: newValue } );
		}

		/**
		 * Handle change and save event
		 * @param {string} name Name of edited sub-value
		 * @param {string} value new value
		 */
		setValue( name, value ) {
			// make new state value
			var newValue = { ...this.state.value, [ name ]: value };

			// make css string
			var cssValue = "";
			if ( name == "debug" ) cssValue = value;
			else {
				cssValue = newValue.line.join( ' ' );
				if ( cssValue != "none" ) {
					if ( newValue.style != "solid" ) cssValue += ' ' + newValue.style;
					if ( newValue.color != "" ) cssValue += ' ' + newValue.color;
					if ( newValue.thickness != "" ) cssValue += ' ' + newValue.thickness;
				}
			}

			// check default
			if ( _.has( this.props, "default" ) ) {
				if ( cssValue == this.props.default.value ) {
					cssValue = this.props.default.var;
				}
			}

			// set state and value
			this.setState( { value: newValue } );
			this.props.onChange( cssValue );
		}

		render() {

			var value = this.state.value;

			return [
				el( "div", { className: "text_decoration_control" }, [

					this.props.label ? el( 'label', {}, this.props.label ) : "",

					el( "div", {}, [
						el( greyd.components.GlobalStylesColorGradientPopupControl, {
							label: __( "Color", 'greyd-theme' ),
							mode: 'color',
							value: value.color,
							onChange: ( newValue ) => {
								this.setValue( "color", newValue );
							}
						} )
					] ),

					el( HStack, {}, [
						el( greyd.components.OptionsControl, {
							style: { width: "100%" },
							value: value.line.join( ' ' ),
							options: [
								"none",
								"underline", "overline", "line-through",
								"underline overline", "underline line-through", "overline line-through",
								"underline overline line-through",
							],
							onChange: ( newValue ) => {
								this.setValue( "line", [ newValue ] );
							}
						} ),

						el( greyd.components.OptionsControl, {
							style: { width: "100%" },
							value: value.style,
							options: [ "solid", "double", "dotted", "dashed", "wavy" ],
							onChange: ( newValue ) => {
								this.setValue( "style", newValue );
							}
						} ),
					] ),

					el( UnitControl, {
						value: value.thickness,
						min: 0,
						units: [
							{ value: 'px', label: 'px', step: 0.1 },
							{ value: 'em', label: 'em', step: 0.01 },
							{ value: '%', label: '%', step: 0.1 },
						],
						onChange: ( newValue ) => {
							this.setValue( "thickness", newValue );
						}
					} )

				] )
			];
		}
	};


	/**
	 * FontfamilyControl grouping options controls.
	 * 
	 * @property {string} label
	 * @property {string} value
	 * @property {callback} onChange Callback function to be called when value is changed.
	 * 
	 * @returns {object} FontfamilyControl component.
	 */
	greyd.components.FontfamilyControl = class extends wp.element.Component {
		constructor () {
			super();
			// state
			this.state = { type: '', upload: false };
		}
		componentWillMount() {
			this.loadValue( this.props );
		}
		componentWillReceiveProps( props ) {
			this.loadValue( props );
		}

		getType( value ) {

			value = greyd.tools.font.getName(value);

			if ( _.isEmpty(value) ) {
				// return 'custom';
				return 'websafe';
			}

			// check websafe fonts
			if ( this.getOptions( 'websafe' ).indexOf( value ) > -1 ) {
				return 'websafe';
			}

			// check google fonts
			if ( this.getOptions( 'google' ).indexOf( value ) > -1 ) {
				return 'google';
			}

			// check modern fonts
			var modernFont = this.getOptions( 'modern' ).find(obj => {
				return obj.value === value
			})
			if ( modernFont ) {
				return 'modern';
			}

			return 'custom';
		}

		loadValue( props ) {
			var value = props.value ?? '';
			var type = this.getType( value );
			if ( type == 'google' || type == 'custom' ) {
				var fontName = greyd.tools.font.getName(value);
				var weights = greyd.tools.font.getWeights(value);
				greyd.tools.font.updatePreview(fontName+greyd.tools.font.setWeights( weights ));
			}
			this.setState( { ...this.state, type: type } );
		}

		getOptions( type ) {
			var options = {
				'type': [
					{ value: 'websafe', label: __( 'Websafe Fonts', 'greyd-theme' ) },
					{ value: 'modern', label: __( 'Modern Font Stacks', 'greyd-theme' ) },
					{ value: 'google', label: __( 'Google Fonts', 'greyd-theme' ) },
					{ value: 'custom', label: __( 'Custom Fonts', 'greyd-theme' ) }
				],
				/**
				 * @link https://www.w3schools.com/cssref/css_websafe_fonts.php
				 */
				'websafe': [
					{ value: '', label: __( 'Select font', 'greyd-theme' ) },
					"Arial, Helvetica, sans-serif",
					"'Arial Black', Gadget, sans-serif",
					"'Comic Sans MS', cursive, sans-serif",
					"Impact, Charcoal, sans-serif",
					"'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
					"Tahoma, Geneva, sans-serif",
					"'Trebuchet MS', Helvetica, sans-serif",
					"Verdana, Geneva, sans-serif",
					"Georgia, serif",
					"'Palatino Linotype', 'Book Antiqua', Palatino, serif",
					"'Times New Roman', Times, serif",
					"'Courier New', Courier, monospace",
					"'Lucida Console', Monaco, monospace",
				],
				/**
				 * @link https://modernfontstacks.com/
				 */
				'modern': [
					{
						label: __( 'Select font', 'greyd-theme' ),
						value: ''
					},
					{
						label: "DM Sans (Theme default)",
						value: "DM Sans, Inter, 'Helvetica Neue', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Arial Nova', 'Nimbus Sans', Arial, sans-serif"
					},
					{
						label: "System UI",
						value: "system-ui, sans-serif"
					},
					{
						label: "Modern Sans",
						value: "Inter, 'Helvetica Neue', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Arial Nova', 'Nimbus Sans', Arial, sans-serif"
					},
					{
						label: "Neo-Grotesque",
						value: "Inter, Roboto, 'Helvetica Neue', 'Arial Nova', 'Nimbus Sans', Arial, sans-serif"
					},
					{
						label: "Geometric Humanist",
						value: "Avenir, 'Avenir Next LT Pro', Montserrat, Corbel, 'URW Gothic', source-sans-pro, sans-serif"
					},
					{
						label: "Classical Humanist",
						value: "Optima, Candara, 'Noto Sans', source-sans-pro, sans-serif"
					},
					{
						label: "Humanist",
						value: "Seravek, 'Gill Sans Nova', Ubuntu, Calibri, 'DejaVu Sans', source-sans-pro, sans-serif"
					},
					{
						label: "Transitional",
						value: "Charter, 'Bitstream Charter', 'Sitka Text', Cambria, serif"
					},
					{
						label: "Old Style",
						value: "'Iowan Old Style', 'Palatino Linotype', 'URW Palladio L', P052, serif"
					},
					{
						label: "Monospace Slab Serif",
						value: "'Nimbus Mono PS', 'Courier New', 'Cutive Mono', monospace"
					},
					{
						label: "Monospace Code",
						value: "ui-monospace, 'Cascadia Code', 'Source Code Pro', Menlo, Consolas, 'DejaVu Sans Mono', monospace"
					},
					{
						label: "Industrial",
						value: "Bahnschrift, 'DIN Alternate', 'Franklin Gothic Medium', 'Nimbus Sans Narrow', sans-serif-condensed, sans-serif"
					},
					{
						label: "Rounded Sans",
						value: "ui-rounded, 'Hiragino Maru Gothic ProN', Quicksand, Comfortaa, Manjari, 'Arial Rounded MT Bold', Calibri, source-sans-pro, sans-serif"
					},
					{
						label: "Slab Serif",
						value: "Rockwell, 'Rockwell Nova', 'Roboto Slab', 'DejaVu Serif', 'Sitka Small', serif"
					},
					{
						label: "Antique",
						value: "Superclarendon, 'Bookman Old Style', 'URW Bookman', 'URW Bookman L', 'Georgia Pro', Georgia, serif"
					},
					{
						label: "Didone",
						value: "Didot, 'Bodoni MT', 'Noto Serif Display', 'URW Palladio L', P052, Sylfaen, serif"
					},
					{
						label: "Handwritten",
						value: "'Segoe Print', 'Bradley Hand', Chilanka, TSCu_Comic, casual, cursive"
					}
				],
				'google': [
					{ value: '', label: __( 'Select font', 'greyd-theme' ) },
					...greyd.tools.font.getGoogleFonts()
				],
				'custom': [
					{ value: '', label: __( 'Select font', 'greyd-theme' ) },
					...greyd.tools.font.getCustomFonts()
				]
			};

			return options[ type ];
		}

		getFontWeightOptions( name ) {

			var options = [
				{ disabled: true, value: '100',  label: 'Thin 100' },
				{ disabled: true, value: '100i', label: 'Thin 100 Italic' },
				{ disabled: true, value: '200',  label: 'Extra Light 200' },
				{ disabled: true, value: '200i', label: 'Extra Light 200 Italic' },
				{ disabled: true, value: '300',  label: 'Light 300' },
				{ disabled: true, value: '300i', label: 'Light 300 Italic' },
				{ disabled: true, value: '400',  label: 'Regular 400' },
				{ disabled: true, value: '400i', label: 'Regular 400 Italic' },
				{ disabled: true, value: '500',  label: 'Medium 500' },
				{ disabled: true, value: '500i', label: 'Medium 500 Italic' },
				{ disabled: true, value: '600',  label: 'Semi Bold 600' },
				{ disabled: true, value: '600i', label: 'Semi Bold 600 Italic' },
				{ disabled: true, value: '700',  label: 'Bold 700' },
				{ disabled: true, value: '700i', label: 'Bold 700 Italic' },
				{ disabled: true, value: '800',  label: 'Extra Bold 800' },
				{ disabled: true, value: '800i', label: 'Extra Bold 800 Italic' },
				{ disabled: true, value: '900',  label: 'Black 900' },
				{ disabled: true, value: '900i', label: 'Black 900 Italic' },
			];

			var font = greyd.tools.font.getGoogleFont(name);
			if ( font?.variants ) {
				font.variants.forEach( (weight) => {
					options = options.map( (option) => {
						if ( option.value == weight ) {
							option.disabled = false;
						}
						return option;
					} );
				} );
				return options;
			}
			return [];

		}

		render() {
			var value = this.props.value ?? '';
			var type = this.state.type;

			var fontName = greyd.tools.font.getName(value);
			var weights = greyd.tools.font.getWeights(value);

			return [
				_.has( this.props, 'label' ) && el( 'label', {
					style: { display: "block", margin: "16px 0px 8px", fontWeight: "600" },
				}, this.props.label ),
				// type
				el( greyd.components.OptionsControl, {
					style: { width: "100%" },
					value: type,
					options: this.getOptions( 'type' ),
					onChange: ( newValue ) => {
						this.setState( { ...this.state, type: newValue } );
					},
				} ),
				// websafe
				type == 'websafe' && el( greyd.components.OptionsControl, {
					style: { width: "100%" },
					value: value,
					options: this.getOptions( 'websafe' ),
					onChange: ( newValue ) => {
						if ( _.isEmpty(newValue) ) return;
						this.props.onChange( newValue );
					},
				} ),
				// modern
				type == 'modern' && el( greyd.components.OptionsControl, {
					style: { width: "100%" },
					value: value,
					options: this.getOptions( 'modern' ),
					onChange: ( newValue ) => {
						if ( _.isEmpty(newValue) ) return;
						this.props.onChange( newValue );
					},
				} ),
				// google
				type == 'google' && [
					/**
					 * convert/deprecate google fonts
					 * @since 1.13.0
					 */
					el( greyd.components.DeprecatedFontControl, {
						type: type
					} ),
					el( greyd.components.OptionsControl, {
						style: { width: "100%" },
						value: fontName, // value,
						options: this.getOptions( 'google' ),
						onChange: ( newValue ) => {
							if ( _.isEmpty(newValue) ) return;
							this.props.onChange( newValue );
						},
					} ),
					el( greyd.components.MultiselectControl, {
						style: { width: "100%" },
						value: weights,
						options: this.getFontWeightOptions(fontName),
						onChange: ( newValue ) => {
							var value = fontName;
							if ( !_.isEmpty(newValue) ) {
								value = fontName+greyd.tools.font.setWeights( newValue );
							}
							this.props.onChange( value );
						},
					} ),
					el( greyd.components.GoogleFontControl, {
						value: value,
						onChange: ( newValue ) => {
							this.props.onChange( newValue );
						}
					} )
				],
				// custom
				type == 'custom' && [
					/**
					 * convert/deprecate custom fonts
					 * @since 1.13.0
					 */
					el( greyd.components.DeprecatedFontControl, {
						type: type
					} ),
					el( greyd.components.OptionsControl, {
						style: { width: "100%" },
						value: value,
						options: this.getOptions( 'custom' ),
						onChange: ( newValue ) => {
							if ( _.isEmpty(newValue) ) return;
							this.props.onChange( newValue );
						},
					} ),
					el( greyd.components.CustomFontControl, {
						value: value,
						onChange: ( newValue ) => {
							this.props.onChange( newValue );
						}
					} )
				]
			];
		}
	};

	/**
	 * Multiple Checkboxes that take and return an array of values.
	 */
	greyd.components.MultiselectControl = class extends wp.element.Component {
		constructor () {
			super();
		}
		render() {
			const {
				label,
				value,
				options = [],
				onChange
			} = this.props;

			var returnFormat = 'array';

			if ( ! _.isEmpty( value ) && typeof value === 'string' ) {
				value = value.split( ',' );
				returnFormat = 'string';
			}

			if ( ! _.isArray( value ) ) {
				value = [];
			}

			return el( wp.components.BaseControl, {
				label: label,
				className: "greyd-multiselect-control"
			}, [
				// loop through options and display a checkbox for each
				...options.map( ( option, index ) => {
					return el( wp.components.CheckboxControl, {
						className: option.disabled ? 'disabled' : '',
						key: index,
						label: option.label,
						checked: value.indexOf( option.value ) > -1,
						onChange: ( newValue ) => {
							if ( newValue ) {
								value.push( option.value );
							}
							else {
								value.splice( value.indexOf( option.value ), 1 );
							}
							onChange( returnFormat == 'array' ? value : value.join( ',' ) );
						},
					} );
				} )
			] );
		}
	};


	/**
	 * ClampMinMaxControl.
	 * 
	 * @property {string} label
	 * @property {string} help
	 * @property {string} value
	 * @property {callback} onChange Callback function to be called when value is changed.
	 * 
	 * @returns {object} ClampMinMaxControl component.
	 */
	greyd.components.ClampMinMaxControl = class extends wp.element.Component {
		constructor () {
			super();
			// state
			this.state = {};
		}
		componentWillMount() {
			this.initState( this.props );
		}

		// state
		initState( props ) {
			this.setState( {
				...this.state,
				...this.getMode(props),
				values: {}
			} );
		}

		getMode(props) {

			const {
				value = '',
				modes = [ 'static', 'min', 'max', 'clamp' ],
				enableCustom = false
			} = props;

			var mode = '';
			var custom = false;
			if ( value.match( /^clamp\([\s\d\.]+[^0-9,]+,[\s\d\.]+[^0-9,]+,[\s\d\.]+[^0-9,]+\)$/ ) ) {
				mode = 'clamp';
			}
			else if ( value.match( /^clamp\([\s\d\.]+[^0-9,]+,\s+[^,]+,[\s\d\.]+[^0-9,]+\)$/ ) ) {
				if ( modes.indexOf( 'fluid' ) !== -1 ) mode = 'fluid';
			}
			else if ( value.match( /^min\([\s\d\.]+[^0-9,]+,[\s\d\.]+[^0-9,]+\)$/ ) ) {
				mode = 'min';
			}
			else if ( value.match( /^max\([\s\d\.]+[^0-9,]+,[\s\d\.]+[^0-9,]+\)$/ ) ) {
				mode = 'max';
			}
			else if ( !value.match( /^[\s\d\.]+[^0-9,]+$/ ) ) {
				if ( enableCustom ) custom = true;
			}

			return {
				mode: mode,
				custom: custom
			};
		}

		getSingleValues( newMode ) {

			// match all single values with unit
			const { value = '' } = this.props;
			var matches = value.match( /([\d\.]+[^0-9,)\s]+)/g );
			
			var values = false;
			if ( newMode == 'clamp' ) {
				var min = '1rem';
				var val = '3vw';
				var max = '2rem';
				if ( matches ) {
					min = matches[0];
					max = matches[matches.length-1];
					if ( matches.length > 2 ) {
						val = matches[matches.length-2];
					}
				}
				values = { min: min, max: max, val: val };
			}
			else if ( newMode == 'fluid' ) {
				var min = '1rem';
				var val = 'calc( 0.5rem + 5vw )';
				var max = '10vw';
				if ( matches ) {
					min = matches[0];
					max = matches[matches.length-1];
				}
				values = { min: min, max: max, val: val };
			}
			else if ( newMode == 'min' ) {
				var min = '1rem';
				var max = '4vw';
				if ( matches ) {
					min = matches[0];
					max = matches[matches.length-1];
				}
				values = { min: min, max: max, val: false };
			}
			else if ( newMode == 'max' ) {
				var min = '10rem';
				var max = '4vw';
				if ( matches ) {
					min = matches[0];
					max = matches[matches.length-1];
				}
				values = { min: min, max: max, val: false };
			}
			else {
				var val = '1rem';
				if ( matches ) {
					val = matches[0];
				}
				values = { min: false, max: false, val: val };
			}

			return values;
		}

		getValue( newMode ) {

			// get single values
			const { min, max, val } = this.getSingleValues(newMode);
			
			var newValue = false;
			if ( newMode == 'clamp' ) {
				newValue = 'clamp(' + min + ', ' + val + ', ' + max + ')';
			}
			else if ( newMode == 'fluid' ) {
				newValue = 'clamp(' + min + ', calc((' + min + ' + ' + max + ') / 2 ), ' + max + ')';
			}
			else if ( newMode == 'min' ) {
				newValue = 'min(' + min + ', ' + max + ')';
			}
			else if ( newMode == 'max' ) {
				newValue = 'max(' + min + ', ' + max + ')';
			}
			else {
				newValue = val;
			}

			return newValue;
		}

		getControl() {

			// get single values
			const { min, max, val } = this.getSingleValues(this.state.mode);

			// get value
			const {
				value = ''
			} = this.props;

			const getMin = ( val ) => {
				var min = 1;
				if ( val && val.indexOf( 'em' ) > 0 ) min = 0.05;
				if ( val && val.indexOf( 'v' ) > 0 ) min = 0.1;
				return min;
			};

			var control = null;

			if ( this.state.custom ) {
				control = el( wp.element.Fragment, {}, [
					el( wp.components.TextControl, {
						value: value,
						onChange: ( newValue ) => {
							if ( _.isEmpty( newValue ) ) {
								newValue = '1rem';
							}
							this.props.onChange( newValue )
						},
					} )
				] );
			}
			else if ( this.state.mode == 'fluid' ) {
				control = el( wp.element.Fragment, {}, [
					el( wp.components.Flex, {
						gap: 3,
						align: 'center',
						justify: 'space-between'
					}, [
						el( wp.components.FlexBlock, {}, [
							el( wp.components.__experimentalUnitControl, {
								label: "Minimum",
								value: min,
								min: getMin( min ),
								step: getMin( min ),
								onChange: ( newValue ) => this.props.onChange( 'clamp(' + newValue + ', calc((' + newValue + ' + ' + max + ') / 2 ), ' + max + ')' ),
							} ),
						] ),
						el( wp.components.FlexBlock, {}, [
							el( wp.components.__experimentalUnitControl, {
								label: "Maximum",
								value: max,
								min: getMin( max ),
								step: getMin( max ),
								onChange: ( newValue ) => this.props.onChange( 'clamp(' + min + ', calc((' + min + ' + ' + newValue + ') / 2 ), ' + newValue + ')' ),
							} )
						] )
					] )
				] );
			}
			else if ( this.state.mode == 'clamp' ) {
				control = el( wp.element.Fragment, {}, [
					el( wp.components.Flex, {
						gap: 3,
						align: 'center',
						justify: 'space-between'
					}, [
						el( wp.components.FlexBlock, {}, [
							el( wp.components.__experimentalUnitControl, {
								label: __( "Minimum", 'greyd-theme' ),
								value: min,
								min: getMin( min ),
								step: getMin( min ),
								onChange: ( newValue ) => this.props.onChange( 'clamp(' + newValue + ', ' + val + ', ' + max + ')' ),
							} ),
						] ),
						el( wp.components.FlexBlock, {}, [
							el( wp.components.__experimentalUnitControl, {
								label: __( "Preferred", 'greyd-theme' ),
								value: val,
								min: getMin( val ),
								step: getMin( val ),
								onChange: ( newValue ) => this.props.onChange( 'clamp(' + min + ', ' + newValue + ', ' + max + ')' ),
							} ),
						] ),
						el( wp.components.FlexBlock, {}, [
							el( wp.components.__experimentalUnitControl, {
								label: __( "Maximum", 'greyd-theme' ),
								value: max,
								min: getMin( max ),
								step: getMin( max ),
								onChange: ( newValue ) => this.props.onChange( 'clamp(' + min + ', ' + val + ', ' + newValue + ')' ),
							} )
						] )
					] )
				] );
			}
			else if ( this.state.mode == 'min' ) {
				control = el( wp.element.Fragment, {}, [
					el( wp.components.Flex, {
						gap: 3,
						align: 'center',
						justify: 'space-between'
					}, [

						el( wp.components.FlexBlock, {}, [
							el( wp.components.__experimentalUnitControl, {
								value: min,
								min: getMin( min ),
								step: getMin( min ),
								onChange: ( newValue ) => this.props.onChange( 'min(' + newValue + ', ' + max + ')' ),
							} ),
						] ),
						el( wp.components.FlexBlock, {}, [
							el( wp.components.__experimentalUnitControl, {
								value: max,
								min: getMin( max ),
								step: getMin( max ),
								onChange: ( newValue ) => this.props.onChange( 'min(' + min + ', ' + newValue + ')' ),
							} )
						] )
					] )
				] );
			}
			else if ( this.state.mode == 'max' ) {
				control = el( wp.element.Fragment, {}, [
					el( wp.components.Flex, {
						gap: 3,
						align: 'center',
						justify: 'space-between'
					}, [

						el( wp.components.FlexBlock, {}, [
							el( wp.components.__experimentalUnitControl, {
								value: min,
								min: getMin( min ),
								step: getMin( min ),
								onChange: ( newValue ) => this.props.onChange( 'max(' + newValue + ', ' + max + ')' ),
							} ),
						] ),
						el( wp.components.FlexBlock, {}, [
							el( wp.components.__experimentalUnitControl, {
								value: max,
								min: getMin( max ),
								step: getMin( max ),
								onChange: ( newValue ) => this.props.onChange( 'max(' + min + ', ' + newValue + ')' ),
							} )
						] )
					] )
				] );
			}
			else {
				control = el( wp.element.Fragment, {}, [
					el( wp.components.__experimentalUnitControl, {
						style: { display: "inline-block", maxWidth: "60%", verticalAlign: "middle" },
						value: val,
						min: getMin( val ),
						step: getMin( val ),
						onChange: ( newValue ) => {
							if ( _.isEmpty( newValue ) ) {
								newValue = '1rem';
							}
							this.props.onChange( newValue )
						},
					} )
				] );
			}

			return control;
		}

		render() {

			const {
				label = "",
				help = "",
				value = '',
				modes = [ 'static', 'min', 'max', 'clamp' ],
				enableCustom = false
			} = this.props;

			const {
				mode = "",
				custom = false,
				values = {}
			} = this.state;

			return el( BaseControl, {
				className: this.props.className,
				label: label,
				help: help,
			}, [
				// control
				this.getControl(),
				// mode select
				custom ? null : el( greyd.components.ButtonGroupControl, {
					value: mode,
					options: [
						{ value: 'static', label: __( 'static', 'greyd-theme' ) },
						{ value: 'min', label: __( 'min', 'greyd-theme' ) },
						{ value: 'max', label: __( 'max', 'greyd-theme' ) },
						{ value: 'clamp', label: __( 'clamp', 'greyd-theme' ) },
						{ value: 'fluid', label: __( 'fluid', 'greyd-theme' ) }
					].filter( option => {
						return modes.indexOf( option.value ) !== -1;
					} ),
					onChange: ( val ) => {
						// set state
						this.setState( {
							...this.state,
							mode: val,
							values: {
								// remember old state value
								...values,
								[mode]: value
							}
						} );
						// set value
						if ( values[val] ) {
							// set from state values
							this.props.onChange( values[val] );
						}
						else {
							// make new value
							this.props.onChange( this.getValue(val) );
						}

					},
				} ),
				// custom input
				!enableCustom ? null : el( wp.components.ToggleControl, {
					label: __( 'enable custom input', 'greyd-theme' ),
					checked: custom,
					onChange: ( val ) => {
						this.setState( {
							...this.state,
							...this.getMode(this.props),
							custom: !!val
						} );
					}
				} ),
			] );
		}
	};

	/**
	 * Preview component to show a visual preview of global styles values.
	 * 
	 * @property {string} mode		font, heading, button, link or form.
	 * @property {string[]} vars	
	 * @property {string} slug
	 * 
	 * @returns {object} Preview component.
	 */
	greyd.components.StylesPreview = class extends wp.element.Component {
		constructor () {
			super();
			// state
			this.state = {
				mode: "",
			};
		}
		componentWillMount() {
			this.loadValue( this.props );
		}
		componentWillReceiveProps( props ) {
			this.loadValue( props );
		}
		loadValue( props ) {
			if ( _.has( props, "mode" ) ) {

				// bc
				var fonts = [];
				var fontslugs = [];
				if ( props.mode == "font" ) {
					if ( props.vars[ 'font-family' ][ props.slug ] ) {
						fonts.push( props.vars[ 'font-family' ][ props.slug ] );
						fontslugs.push( props.slug );
					}
				}
				if ( props.mode == "heading" ) {
					if ( props.vars[ 'heading' ][ "--wp--custom--greyd--heading--typography--font-family" ] ) {
						var slug = props.vars[ 'heading' ][ "--wp--custom--greyd--heading--typography--font-family" ].replace( "var(", "" ).replace( ")", "" );
						fonts.push( props.vars[ 'font-family' ][ slug ] );
						fontslugs.push( slug );
					}
				}
				if ( props.mode == "button" ) {
					if ( props.vars[ 'button' ][ "--wp--custom--greyd--button--typography--font-family" ] ) {
						var slug = props.vars[ 'button' ][ "--wp--custom--greyd--button--typography--font-family" ].replace( "var(", "" ).replace( ")", "" );
						fonts.push( props.vars[ 'font-family' ][ slug ] );
						fontslugs.push( slug );
					}
				}
				if ( props.mode == "link" ) {
					if ( props.vars[ 'link' ][ "--wp--custom--greyd--link--typography--font-family" ] ) {
						var slug = props.vars[ 'link' ][ "--wp--custom--greyd--link--typography--font-family" ].replace( "var(", "" ).replace( ")", "" );
						fonts.push( props.vars[ 'font-family' ][ slug ] );
						fontslugs.push( slug );
					}
				}
				if ( props.mode == "form" ) {
					if ( props.vars[ 'form' ][ "--wp--custom--greyd--input--typography--font-family" ] ) {
						var slug = props.vars[ 'form' ][ "--wp--custom--greyd--input--typography--font-family" ].replace( "var(", "" ).replace( ")", "" );
						fonts.push( props.vars[ 'font-family' ][ slug ] );
						fontslugs.push( slug );
					}
					if ( props.vars[ 'form' ][ "--wp--custom--greyd--input--label--typography--font-family" ] ) {
						var slug = props.vars[ 'form' ][ "--wp--custom--greyd--input--label--typography--font-family" ].replace( "var(", "" ).replace( ")", "" );
						fonts.push( props.vars[ 'font-family' ][ slug ] );
						fontslugs.push( slug );
					}
				}
				fontslugs.forEach( ( font ) => {
					greyd.tools.settings.getFontFamilies().forEach( fontfamily => {
						if ( fontfamily.slug == font && greyd.tools.font.isGoogle( fontfamily.family ) ) {
							var family = fontfamily.family;
							// make weights
							if ( fontfamily.faces && fontfamily.faces.length > 0 ) {
								var weights = [];
								fontfamily.faces.forEach( face => {
									if ( face.fontStyle == 'italic') weights.push(face.fontWeight+'i');
									else weights.push(face.fontWeight);
								} );
								family += greyd.tools.font.setWeights(weights);
							}
							// load/update google font in editor
							greyd.tools.font.previewGoogle(family);
						}
					} );
				} );

				this.setState( {
					mode: props.mode,
					id: "preview-" + props.mode + "-" + greyd.tools.generateRandomID()
				} );
			}
		}

		makeCssVars( atts ) {

			var results = {};

			// font-family
			if ( atts["font-family"] && atts["font-family"].match( /^var\(.*\)$/ ) ) {
				var fontslug = atts["font-family"].replace('var(', '').replace(')', '');
				results[fontslug] = this.props.vars[ 'font-family' ][fontslug];
			}
			// font-size
			if ( atts["font-size"] && atts["font-size"].match( /^var\(.*\)$/ ) ) {
				var fontsize = atts["font-size"].replace('var(', '').replace(')', '');
				results[fontsize] = this.props.vars[ 'font-size' ][fontsize];
			}
			// color
			if ( atts["color"] && atts["color"].match( /^var\(.*\)$/ ) ) {
				var color = atts["color"].replace('var(', '').replace(')', '');
				results[color] = greyd.tools.settings.getColorValue(atts["color"]);
			}
			if ( atts["hover-color"] && atts["hover-color"].match( /^var\(.*\)$/ ) ) {
				var color = atts["hover-color"].replace('var(', '').replace(')', '');
				results[color] = greyd.tools.settings.getColorValue(atts["hover-color"]);
			}
			// background
			if ( atts["background"] && atts["background"].match( /var\(.*\)/ ) ) {
				var matches = atts["background"].match( /(var\([^\)]+\))/g );
				matches.forEach( (match) => {
					var background = match.replace('var(', '').replace(')', '');
					results[background] = greyd.tools.settings.getColorValue(match);
				} );
			}
			if ( atts["hover-background"] && atts["hover-background"].match( /var\(.*\)/ ) ) {
				var matches = atts["hover-background"].match( /(var\([^\)]+\))/g );
				matches.forEach( (match) => {
					var background = match.replace('var(', '').replace(')', '');
					results[background] = greyd.tools.settings.getColorValue(match);
				} );
			}
			// border--color
			if ( atts["border-color"] && atts["border-color"].match( /^var\(.*\)$/ ) ) {
				var border = atts["border-color"].replace('var(', '').replace(')', '');
				results[border] = greyd.tools.settings.getColorValue(atts["border-color"]);
			}
			if ( atts["hover-border-color"] && atts["hover-border-color"].match( /^var\(.*\)$/ ) ) {
				var border = atts["hover-border-color"].replace('var(', '').replace(')', '');
				results[border] = greyd.tools.settings.getColorValue(atts["hover-border-color"]);
			}

			var cssvars = "";
			Object.keys(results).forEach( (key) => {
				cssvars += key + ": " + results[key] + "; ";
			} );
			return cssvars;
		}

		getLabel( slug ) {
			if ( _.has( this.props, 'labels' ) && _.has( this.props.labels, slug ) ) {
				return this.props.labels[ slug ];
			}
			return slug;
		}

		makeFont( slug ) {
			var vars = this.props.vars;
			const innerBlocks = _.has( this.props, "children" ) ? this.props.children : this.getLabel( slug );

			var style = "." + this.state.id + " { " +
				"font-family: " + vars[ 'font-family' ][ slug ] + "; " +
			" }";

			return [
				el( 'div', { className: this.state.id, style: { margin: "4px", textAlign: "center" } }, innerBlocks ),
				el( 'style', { dangerouslySetInnerHTML: { __html: style } } ),
			];
		}

		makeButton( slug ) {
			var vars = this.props.vars[ 'button' ];
			var [ slug, size = '' ] = slug.split( ' ' );
			const innerBlocks = _.has( this.props, "children" ) ? this.props.children : this.getLabel( slug );

			var style = "." + this.state.id + "." + slug + " { " +
				// css vars
				this.makeCssVars( {
					"font-family": vars[ "--wp--custom--greyd--button--typography--font-family" ],
					"font-size": vars[ "--wp--custom--greyd--button--typography--font-size" ],
					"color": vars[ "--wp--custom--greyd--button--" + slug + "--color--text" ],
					"background": vars[ "--wp--custom--greyd--button--" + slug + "--color--background" ],
					"border-color": vars[ "--wp--custom--greyd--button--" + slug + "--border--color" ],
					// hover
					"hover-color": vars[ "--wp--custom--greyd--button--" + slug + "--hover--color--text" ],
					"hover-background": vars[ "--wp--custom--greyd--button--" + slug + "--hover--color--background" ],
					"hover-border-color": vars[ "--wp--custom--greyd--button--" + slug + "--hover--border--color" ],
				} ) +
				// typo
				"font-family: " + vars[ "--wp--custom--greyd--button--typography--font-family" ] + "; " +
				"font-size: " + vars[ "--wp--custom--greyd--button--typography--font-size" ] + "; " +
				"font-weight: " + vars[ "--wp--custom--greyd--button--typography--font-weight" ] + "; " +
				"text-transform: " + vars[ "--wp--custom--greyd--button--typography--text-transform" ] + "; " +
				"letter-spacing: " + vars[ "--wp--custom--greyd--button--typography--letter-spacing" ] + "; " +
				"word-spacing: " + vars[ "--wp--custom--greyd--button--typography--word-spacing" ] + "; " +
				// spacing
				"padding-top: " + vars[ "--wp--custom--greyd--button--spacing--padding--top" ] + "; " +
				"padding-bottom: " + vars[ "--wp--custom--greyd--button--spacing--padding--bottom" ] + "; " +
				"padding-left: " + vars[ "--wp--custom--greyd--button--spacing--padding--left" ] + "; " +
				"padding-right: " + vars[ "--wp--custom--greyd--button--spacing--padding--right" ] + "; " +
				// color
				"color: " + vars[ "--wp--custom--greyd--button--" + slug + "--color--text" ] + "; " +
				"background: " + vars[ "--wp--custom--greyd--button--" + slug + "--color--background" ] + "; " +
				// radius
				"border-radius: " + vars[ "--wp--custom--greyd--button--" + slug + "--border--radius" ] + "; " +
				// border
				"border-width: " + vars[ "--wp--custom--greyd--button--" + slug + "--border--width" ] + "; " +

				"border-style: " + vars[ "--wp--custom--greyd--button--" + slug + "--border--style" ] + "; " +
				"border-color: " + vars[ "--wp--custom--greyd--button--" + slug + "--border--color" ] + "; " +
				// shadow
				"box-shadow: " + vars[ "--wp--custom--greyd--button--" + slug + "--shadow" ] + "; " +
				"cursor: pointer; " +
				"transition: all .2s ease; " +
			" }" +
			"." + this.state.id + "." + slug + ":hover { " +
				// color
				"color: " + vars[ "--wp--custom--greyd--button--" + slug + "--hover--color--text" ] + "; " +
				"background: " + vars[ "--wp--custom--greyd--button--" + slug + "--hover--color--background" ] + "; " +
				// border
				"border-width: " + vars[ "--wp--custom--greyd--button--" + slug + "--hover--border--width" ] + "; " +
				"border-style: " + vars[ "--wp--custom--greyd--button--" + slug + "--hover--border--style" ] + "; " +
				"border-color: " + vars[ "--wp--custom--greyd--button--" + slug + "--hover--border--color" ] + "; " +
				// shadow
				"box-shadow: " + vars[ "--wp--custom--greyd--button--" + slug + "--hover--shadow" ] + "; " +
			" }";
			if ( size != "" )
				style += "." + this.state.id + "." + slug + "." + size + " { " +
					// css vars
					this.makeCssVars( {
						"font-size": vars[ "--wp--custom--greyd--button--" + size + "--typography--font-size" ],
					} ) +
					// typo
					"font-size: " + vars[ "--wp--custom--greyd--button--" + size + "--typography--font-size" ] + "; " +
					// spacing
					"padding-top: " + vars[ "--wp--custom--greyd--button--" + size + "--spacing--padding--top" ] + "; " +
					"padding-bottom: " + vars[ "--wp--custom--greyd--button--" + size + "--spacing--padding--bottom" ] + "; " +
					"padding-left: " + vars[ "--wp--custom--greyd--button--" + size + "--spacing--padding--left" ] + "; " +
					"padding-right: " + vars[ "--wp--custom--greyd--button--" + size + "--spacing--padding--right" ] + "; " +
					" }" +
					"." + this.state.id + "." + slug + "." + size + ":hover { " +
					// typo
					"font-size: " + vars[ "--wp--custom--greyd--button--" + size + "--hover--typography--font-size" ] + "; " +
					// spacing
					"padding-top: " + vars[ "--wp--custom--greyd--button--" + size + "--hover--spacing--padding--top" ] + "; " +
					"padding-bottom: " + vars[ "--wp--custom--greyd--button--" + size + "--hover--spacing--padding--bottom" ] + "; " +
					"padding-left: " + vars[ "--wp--custom--greyd--button--" + size + "--hover--spacing--padding--left" ] + "; " +
					"padding-right: " + vars[ "--wp--custom--greyd--button--" + size + "--hover--spacing--padding--right" ] + "; " +
				" }";

			return [
				el( 'div', { className: this.state.id + " " + slug + " " + size, style: { margin: "4px" } }, innerBlocks ),
				el( 'style', { dangerouslySetInnerHTML: { __html: style } } ),
			];
		}

		makeForm( slug ) {
			var vars = this.props.vars[ 'input' ];
			const innerBlocks = _.has( this.props, "children" ) ? this.props.children : this.getLabel( slug );

			if ( !_.has( vars, "--wp--custom--greyd--input--" + slug + "--color--text" ) ) return [];

			var style = "." + this.state.id + "." + slug + " { ";

			if ( slug == 'label' ) {
				style +=
					// css vars
					this.makeCssVars( {
						"font-family": vars[ "--wp--custom--greyd--input--" + slug + "--typography--font-family" ],
						"font-size": vars[ "--wp--custom--greyd--input--" + slug + "--typography--font-size" ],
						"color": vars[ "--wp--custom--greyd--input--" + slug + "--color--text" ],
						"background": vars[ "--wp--custom--greyd--input--" + slug + "--color--background" ],
					} ) +
					// typo
					"font-family: " + vars[ "--wp--custom--greyd--input--" + slug + "--typography--font-family" ] + "; " +
					"font-size: " + vars[ "--wp--custom--greyd--input--" + slug + "--typography--font-size" ] + "; " +
					"font-weight: " + vars[ "--wp--custom--greyd--input--" + slug + "--typography--font-weight" ] + "; " +
					"line-height: " + vars[ "--wp--custom--greyd--input--" + slug + "--typography--line-height" ] + "; " +
					"text-transform: " + vars[ "--wp--custom--greyd--input--" + slug + "--typography--text-transform" ] + "; " +
					"letter-spacing: " + vars[ "--wp--custom--greyd--input--" + slug + "--typography--letter-spacing" ] + "; " +
					"word-spacing: " + vars[ "--wp--custom--greyd--input--" + slug + "--typography--word-spacing" ] + "; " +
					// spacing
					"padding-top: " + vars[ "--wp--custom--greyd--input--" + slug + "--spacing--padding--top" ] + "; " +
					"padding-bottom: " + vars[ "--wp--custom--greyd--input--" + slug + "--spacing--padding--bottom" ] + "; " +
					"padding-left: " + vars[ "--wp--custom--greyd--input--" + slug + "--spacing--padding--left" ] + "; " +
					"padding-right: " + vars[ "--wp--custom--greyd--input--" + slug + "--spacing--padding--right" ] + "; " +
					// color
					"color: " + vars[ "--wp--custom--greyd--input--" + slug + "--color--text" ] + "; " +
					"background: " + vars[ "--wp--custom--greyd--input--" + slug + "--color--background" ] + "; " +
				" }";
			}
			else {
				style +=
					// css vars
					this.makeCssVars( {
						"font-family": vars[ "--wp--custom--greyd--input--typography--font-family" ],
						"font-size": vars[ "--wp--custom--greyd--input--typography--font-size" ],
						"color": vars[ "--wp--custom--greyd--input--" + slug + "--color--text" ],
						"background": vars[ "--wp--custom--greyd--input--" + slug + "--color--background" ],
						"border-color": vars[ "--wp--custom--greyd--input--" + slug + "--border--color" ],
						// hover
						"hover-color": vars[ "--wp--custom--greyd--input--" + slug + "--hover--color--text" ],
						"hover-background": vars[ "--wp--custom--greyd--input--" + slug + "--hover--color--background" ],
						"hover-border-color": vars[ "--wp--custom--greyd--input--" + slug + "--hover--border--color" ],
					} ) +
					// typo
					"font-family: " + vars[ "--wp--custom--greyd--input--typography--font-family" ] + "; " +
					"font-size: " + vars[ "--wp--custom--greyd--input--typography--font-size" ] + "; " +
					"font-weight: " + vars[ "--wp--custom--greyd--input--typography--font-weight" ] + "; " +
					"text-transform: " + vars[ "--wp--custom--greyd--input--typography--text-transform" ] + "; " +
					"letter-spacing: " + vars[ "--wp--custom--greyd--input--typography--letter-spacing" ] + "; " +
					"word-spacing: " + vars[ "--wp--custom--greyd--input--typography--word-spacing" ] + "; " +
					// spacing
					"padding-top: " + vars[ "--wp--custom--greyd--input--spacing--padding--top" ] + "; " +
					"padding-bottom: " + vars[ "--wp--custom--greyd--input--spacing--padding--bottom" ] + "; " +
					"padding-left: " + vars[ "--wp--custom--greyd--input--spacing--padding--left" ] + "; " +
					"padding-right: " + vars[ "--wp--custom--greyd--input--spacing--padding--right" ] + "; " +
					// color
					"color: " + vars[ "--wp--custom--greyd--input--" + slug + "--color--text" ] + "; " +
					"background: " + vars[ "--wp--custom--greyd--input--" + slug + "--color--background" ] + "; " +
					// radius
					"border-radius: " + vars[ "--wp--custom--greyd--input--" + slug + "--border--radius" ] + "; " +
					// border
					"border-width: " + vars[ "--wp--custom--greyd--input--" + slug + "--border--width" ] + "; " +
					"border-style: " + vars[ "--wp--custom--greyd--input--" + slug + "--border--style" ] + "; " +
					"border-color: " + vars[ "--wp--custom--greyd--input--" + slug + "--border--color" ] + "; " +
					// shadow
					"box-shadow: " + vars[ "--wp--custom--greyd--input--" + slug + "--shadow" ] + "; " +
					"transition: all .2s ease; " +
				" }" +
				"." + this.state.id + "." + slug + ":hover { " +
					// color
					"color: " + vars[ "--wp--custom--greyd--input--" + slug + "--hover--color--text" ] + "; " +
					"background: " + vars[ "--wp--custom--greyd--input--" + slug + "--hover--color--background" ] + "; " +
					// border
					"border-width: " + vars[ "--wp--custom--greyd--input--" + slug + "--hover--border--width" ] + "; " +
					"border-style: " + vars[ "--wp--custom--greyd--input--" + slug + "--hover--border--style" ] + "; " +
					"border-color: " + vars[ "--wp--custom--greyd--input--" + slug + "--hover--border--color" ] + "; " +
					// shadow
					"box-shadow: " + vars[ "--wp--custom--greyd--input--" + slug + "--hover--shadow" ] + "; " +
				" }";
			}

			return [
				el( 'div', { className: this.state.id + " " + slug, style: { margin: "4px" } }, innerBlocks ),
				el( 'style', { dangerouslySetInnerHTML: { __html: style } } ),
			];
		}

		render() {

			var slug = this.props.slug;
			if ( typeof slug === 'string' ) slug = [ slug ];

			var preview = [];
			if ( this.state.mode == "font" ) preview = [ ...slug.map( ( s ) => this.makeFont( s ) ) ];
			if ( this.state.mode == "button" ) preview = [ ...slug.map( ( s ) => this.makeButton( s ) ) ];
			if ( this.state.mode == "input" ) preview = [ ...slug.map( ( s ) => this.makeForm( s ) ) ];

			return el( 'div', {
				className: 'edit-site-typography-preview',
				style: { flexDirection: 'column' }
			}, preview );
		}
	};

	/**
	 * SpacingSettingsControl grouping margin and padding controls.
	 * 
	 * @property {object} values
	 * 		@property {object} margin
	 * 		@property {object} padding
	 * @property {callback} onChange Callback function to be called when value is changed.
	 * 
	 * @returns {object} SpacingSettingsControl component.
	 */
	greyd.components.SpacingSettingsControl = class extends wp.element.Component {
		constructor () {
			super();
		}
		DimensionControl( atts ) {
			var sides = Object.keys( atts.value );
			return el( greyd.components.DimensionControl, {
				label: atts.label,
				sides: sides,
				value: atts.value,
				onChange: ( newValue ) => {
					var newValues = [];
					for ( var i = 0; i < sides.length; i++ ) {
						var side = sides[ i ];
						if ( typeof newValue[ side ] === 'undefined' || newValue[ side ].indexOf( 'null' ) == 0 )
							newValue[ side ] = atts.default[ side ];
						newValues.push( [ atts.slug[ side ], newValue[ side ] ] );
					}
					this.props.onChange( newValues );
				}
			} );
		}
		render() {
			var values = this.props.values;
			if ( typeof values === 'undefined' ) return [];

			var elements = [];

			if ( _.has( values, 'margin' ) && !_.isEmpty( values.margin ) ) elements.push(
				this.DimensionControl( { ...values.margin, label: __( 'Margin', 'greyd-theme' ) } )
			);

			if ( _.has( values, 'padding' ) && !_.isEmpty( values.padding ) ) elements.push(
				this.DimensionControl( { ...values.padding, label: __( 'Padding', 'greyd-theme' ) } )
			);

			return elements;
		}
	};

	/**
	 * FontSettingsControl grouping various controls for for apearance.
	 * 
	 * @property {object} values
	 * 		@property {object} fontFamily
	 * 		@property {object} fontSize
	 * 		@property {object} fontWeight
	 * 		@property {object} lineHeight
	 * 		@property {object} textTransform
	 * 		@property {object} letterSpacing
	 * 		@property {object} wordSpacing
	 * @property {callback} onChange Callback function to be called when value is changed.
	 * 
	 * @returns {object} FontSettingsControl component.
	 */
	greyd.components.FontSettingsControl = class extends wp.element.Component {
		constructor () {
			super();
		}
		render() {

			var values = this.props.values;
			if ( typeof values === 'undefined' ) return [];

			var elements = [];

			if ( _.has( values, 'fontFamily' ) && !_.isEmpty( values.fontFamily ) ) elements.push(
				el( greyd.components.OptionsControl, {
					style: { width: "100%" },
					label: __( 'Font family', 'greyd-theme' ),
					value: values.fontFamily.value,
					options: values.fontFamily.options,
					onChange: ( newValue ) => {
						if ( newValue === '' ) newValue = values.fontFamily.default;
						this.props.onChange( values.fontFamily.slug, newValue );
					}
				} )
			);

			if ( _.has( values, 'fontSize' ) && !_.isEmpty( values.fontSize ) ) elements.push(
				el ( wp.components.BaseControl, {}, [
					el( wp.components.FontSizePicker, {
						style: { width: "100%" },
						value: values.fontSize.value,
						fontSizes: values.fontSize.options,
						onChange: ( newValue ) => {
							if ( typeof newValue === 'undefined' ) newValue = values.fontSize.default;
							// get font slug from options for saving
							for ( var i = 0; i < values.fontSize.options.length; i++ ) {
								if ( values.fontSize.options[ i ].size == newValue ) {
									newValue = "var(--wp--preset--font-size--" + values.fontSize.options[ i ].slug + ")";
								}
							}
							this.props.onChange( values.fontSize.slug, newValue );
						}
					} )
				] )
			);

			if ( _.has( values, 'fontWeight' ) && !_.isEmpty( values.fontWeight ) ) elements.push(
				el ( wp.components.BaseControl, {}, [
					el( wp.blockEditor.__experimentalFontAppearanceControl, {
						hasFontStyles: false,
						value: { fontWeight: values.fontWeight.value },
						onChange: ( newValue ) => {
							if ( typeof newValue.fontWeight === 'undefined' ) newValue.fontWeight = values.fontWeight.default;
							this.props.onChange( values.fontWeight.slug, newValue.fontWeight );
						}
					} )
				] )
			);

			if ( ( _.has( values, 'lineHeight' ) && !_.isEmpty( values.lineHeight ) ) ||
				( _.has( values, 'textTransform' ) && !_.isEmpty( values.textTransform ) ) ) elements.push(
					el( 'div', {}, [
						( _.has( values, 'lineHeight' ) && !_.isEmpty( values.lineHeight ) ) ?
							el ( wp.components.BaseControl, {}, [
								el( wp.components.__experimentalUnitControl, {
									style: { display: "inline-block", maxWidth: "45%", marginRight: "10%" },
									label: __( 'Line height', 'greyd-theme' ),
									value: values.lineHeight.value,
									min: 0,
									step: 0.005,
									units: [ { value: '', label: '' } ],
									onChange: ( newValue ) => {
										if ( newValue === '' ) newValue = values.lineHeight.default;
										this.props.onChange( values.lineHeight.slug, newValue );
									}
								} )
							] ) : '',

						( _.has( values, 'textTransform' ) && !_.isEmpty( values.textTransform ) ) ?
							el ( wp.components.BaseControl, {}, [
								el( 'div', { style: { display: "inline-flex", maxWidth: "45%" } },
									el( wp.blockEditor.__experimentalTextTransformControl, {
										value: values.textTransform.value,
										onChange: ( newValue ) => {
											if ( typeof newValue === 'undefined' ) newValue = values.textTransform.default;
											this.props.onChange( values.textTransform.slug, newValue );
										}
									} ),
								)
							] ) : ''
					] )
				);

			if ( ( _.has( values, 'letterSpacing' ) && !_.isEmpty( values.letterSpacing ) ) ||
				( _.has( values, 'wordSpacing' ) && !_.isEmpty( values.wordSpacing ) ) ) elements.push(
					el( 'div', {}, [
						( _.has( values, 'letterSpacing' ) && !_.isEmpty( values.letterSpacing ) ) ?
							el ( wp.components.BaseControl, {}, [
								el( wp.components.__experimentalUnitControl, {
									style: { display: "inline-block", maxWidth: "45%", marginRight: "10%", marginBottom: "16px" },
									label: __( 'Letter spacing', 'greyd-theme' ),
									value: values.letterSpacing.value,
									units: [
										{ value: 'px', label: 'px', step: 0.1 },
										{ value: 'em', label: 'em', step: 0.01 },
										{ value: 'rem', label: 'rem', step: 0.01 },
										{ value: 'vh', label: 'vh', step: 0.1 },
										{ value: 'vw', label: 'vw', step: 0.1 },
									],
									onChange: ( newValue ) => {
										if ( newValue === '' ) newValue = values.letterSpacing.default;
										this.props.onChange( values.letterSpacing.slug, newValue );
									}
								} )
							]) : '',

						( _.has( values, 'wordSpacing' ) && !_.isEmpty( values.wordSpacing ) ) ?
							el ( wp.components.BaseControl, {}, [
								el( wp.components.__experimentalUnitControl, {
									style: { display: "inline-block", maxWidth: "45%", marginBottom: "16px" },
									label: __( 'Word spacing', 'greyd-theme' ),
									value: values.wordSpacing.value,
									units: [
										{ value: 'px', label: 'px', step: 0.1 },
										{ value: 'em', label: 'em', step: 0.01 },
										{ value: 'rem', label: 'rem', step: 0.01 },
										{ value: 'vh', label: 'vh', step: 0.1 },
										{ value: 'vw', label: 'vw', step: 0.1 },
									],
									onChange: ( newValue ) => {
										if ( newValue === '' ) newValue = values.wordSpacing.default;
										this.props.onChange( values.wordSpacing.slug, newValue );
									}
								} )
							] ): ''
					] )
				);

			return elements;
		}
	};

	/**
	 * Renders an More advanced PanelBody 
	 * with state (normal/hover/active) OR responsive (xl/lg/md/sm) buttons OR custon set of tabs.
	 * 
	 * @property {string} title Title of the section.
	 * @property {bool} holdsChange If the panel holds a changed value.
	 * @property {array} holdsColors Show color Indicators if value is changed.
	 * ---- state ----
	 * @property {bool} supportsState Whether state controls are supported.
	 * @property {bool} isStateEnabled Whether state controls are toggled on initially.
	 * @property {callback|bool} onStateToggle Function to be called when state controls are toggled. Optional, false to disable toggle.
	 * ---- responsive ----
	 * @property {bool} supportsResponsive Whether responsive controls are supported.
	 * @property {bool} isResponsiveEnabled Whether responsive controls are toggled on initially.
	 * @property {callback|bool} onResponsiveToggle Function to be called when responsive controls are toggled. Optional, false to disable toggle.
	 * ---- custom tabs ----
	 * @property {array} tabs custom array of { title, slug } objects to modify tabs.
	 * @property {callback} onTabSwitch Function to be called when tabs are switched. Optional.
	 * 
	 * @returns {object} AdvancedPanelBody component.
	 */
	greyd.components.GlobalStylesPanelBody = class extends Component {

		constructor ( props ) {
			super( props );

			this.onStateToggle = this.onStateToggle.bind( this );
			this.onResponsiveToggle = this.onResponsiveToggle.bind( this );
			this.onTabSwitch = this.onTabSwitch.bind( this );

			// check if component is in site-editor
			var editor = document.querySelector( ".edit-site-visual-editor" );
			if ( editor ) {
				var iframe = document.querySelector( ".edit-site-visual-editor__editor-canvas" );
				if ( iframe ) {
					editor = iframe.contentWindow.document.querySelector( '.wp-site-blocks' );
				}
			}
			if ( !editor ) {
				editor = document.querySelector( ".editor-styles-wrapper" );
				if ( !editor ) {
					var iframe = document.querySelector( "iframe[name=editor-canvas]" );
					if ( iframe ) {
						editor = iframe.contentWindow.document.querySelector( '.editor-styles-wrapper' );
					}
				}
			}
			this.config = {
				editor: editor,
				stateTabs: [
					{
						label: __( "Default", 'greyd-theme' ),
						slug: ""
					},
					{
						label: __( "Hover", 'greyd-theme' ),
						slug: "hover",
						previewClass: "has-hover"
					},
					{
						label: __( "Active", 'greyd-theme' ),
						slug: "active",
						previewClass: "has-active"
					}
				],
				responsiveTabs: [
					{
						label: el( greyd.components.Icon, { icon: "desktop" } ),
						slug: ""
					},
					{
						label: el( greyd.components.Icon, { icon: "laptop" } ),
						slug: "lg"
					},
					{
						label: el( greyd.components.Icon, { icon: "tablet" } ),
						slug: "md"
					},
					{
						label: el( greyd.components.Icon, { icon: "mobile" } ),
						slug: "sm"
					}
				]
			};

			this.state = {
				isStateEnabled: false,
				isResponsiveEnabled: false,
				tabs: [],
				activeTab: "", // normal
			};
		}

		componentDidMount() {

			var newState = { tabs: [] };
			// states
			if ( _.has( this.props, "supportsState" ) && this.props.supportsState ) {
				newState.tabs = this.config.stateTabs;
				if ( _.has( this.props, "isStateEnabled" ) && this.props.isStateEnabled ) {
					newState.isStateEnabled = true;
				}
			}
			// responsive
			else if ( _.has( this.props, "supportsResponsive" ) && this.props.supportsResponsive ) {
				newState.tabs = this.config.responsiveTabs;
				if ( _.has( this.props, "isResponsiveEnabled" ) && this.props.isResponsiveEnabled ) {
					newState.isResponsiveEnabled = true;
				}
				// responsive preview
				var viewport = this.getViewport();
				// get active tab
				newState.activeTab = this.getActiveTab( viewport );
				// subscribe to viewport change
				this.unsubscribeViewportChange = wp.data.subscribe( () => {
					if ( this.state.isResponsiveEnabled ) {
						var newViewport = this.getViewport();
						if ( viewport !== newViewport ) {
							this.setState( {
								...this.state,
								activeTab: this.getActiveTab( newViewport )
							} );
							viewport = newViewport;
						}
					}
				} );
			}
			// tabs
			else if ( _.has( this.props, "tabs" ) && this.props.tabs && _.isArray( this.props.tabs ) ) {
				newState.tabs = this.props.tabs;
			}

			// check state
			if ( this.config.editor && typeof this.config.editor !== 'undefined' ) {
				// check global preview class
				newState.tabs.forEach( ( tab ) => {
					if ( _.has( tab, 'previewClass' ) && this.config.editor.classList.contains( tab.previewClass ) )
						newState.activeTab = tab.slug;
				} );

				// subscribe to change in classList
				// buggy -> todo
				var classList = JSON.stringify( this.config.editor.classList );
				this.unsubscribePreviewChange = wp.data.subscribe( () => {
					var newClassList = JSON.stringify( this.config.editor.classList );
					if ( !_.isEqual( classList, newClassList ) ) {
						classList = newClassList;
						var newTab = "";
						this.state.tabs.forEach( ( tab ) => {
							if ( _.has( tab, 'previewClass' ) && this.config.editor.classList.contains( tab.previewClass ) ) {
								newTab = tab.slug;
							}
						} );
						this.setState( {
							...this.state,
							activeTab: newTab
						} );
					}
				} );

			}
			else {
				// set individual block preview
			}

			// set state
			if ( !_.isEmpty( newState ) ) {
				this.setState( {
					...this.state,
					...newState
				} );
			}

		}

		componentDidUpdate( prevProps ) {
			// console.log("componentDidUpdate");
		}

		componentWillUnmount() {
			// console.log("componentWillUnmount");
			if ( _.has( this, "unsubscribeViewportChange" ) ) this.unsubscribeViewportChange();
			if ( _.has( this, "unsubscribePreviewChange" ) ) this.unsubscribePreviewChange();
		}

		/**
		 * Default On State Toggle Event. Overridable by @property onStateToggle
		 */
		onStateToggle() {
			var newState = {};
			// switched off
			if ( this.state.isStateEnabled ) {
				newState.isStateEnabled = false;
				newState.activeTab = "";
			}
			// switched on
			else {
				newState.isStateEnabled = true;
				newState.activeTab = "hover"; // maybe
			}
			// set state
			if ( !_.isEmpty( newState ) ) {
				this.setState( {
					...this.state,
					...newState
				} );
			}
		}

		/**
		 * Default On Responsive Toggle Event. Overridable by @property onResponsiveToggle
		 */
		onResponsiveToggle() {
			var newState = {};
			// switched off
			if ( this.state.isResponsiveEnabled ) {
				newState.isResponsiveEnabled = false;
				newState.activeTab = "";
			}
			// switched on
			else {
				newState.isResponsiveEnabled = true;
			}
			// set state
			if ( !_.isEmpty( newState ) ) {
				this.setState( {
					...this.state,
					...newState
				} );
			}
		}

		/**
		 * Default On Tab Switch Event. Overridable by @property onTabSwitch
		 * @param {string} tab ("" | "hover" | "active" | "lg" | "md" | "sm")
		 */
		onTabSwitch( tab ) {
			if ( this.config.editor && typeof this.config.editor !== 'undefined' ) {
				if ( this.state.isResponsiveEnabled ) {
					this.setPreviewWindow( tab );
				}
				else {
					// set global preview class in site-editor
					this.state.tabs.forEach( ( element ) => {
						if ( _.has( element, 'previewClass' ) ) {
							this.config.editor.classList.remove( element.previewClass );
							if ( tab == element.slug ) {
								this.config.editor.classList.add( element.previewClass );
							}
						}
					} );
				}
			}
			else {
				// set individual block preview
			}

			if ( this.state.activeTab != tab ) {
				this.setState( {
					...this.state,
					activeTab: _.isEmpty( tab ) ? "" : tab
				} );
			}
		}


		/**
		 * Set the editor preview window ("Desktop" | "Tablet" | "Mobile")
		 * @param {string} tab ("" | "lg" | "md" | "sm")
		 */
		setPreviewWindow( tab ) {
			const viewports = {
				"": "Desktop",
				"lg": "Desktop",
				"md": "Tablet",
				"sm": "Mobile",
			};
			if ( _.has( viewports, tab ) ) {
				var viewport = viewports[ tab ];
				var currentViewport = this.getViewport();
				if ( currentViewport && !_.isEqual( currentViewport, viewport ) ) {
					this.setViewport( viewport );
				}
			}
		};

		/**
		 * Experimental PreviewDeviceType functions
		 * viewports: ("Desktop" | "Tablet" | "Mobile")
		 */
		getViewport() {
			var store = ( this.config.editor && typeof this.config.editor !== 'undefined' ) ? "core/edit-site" : "core/edit-post";
			if ( !_.has( select( store ), "__experimentalGetPreviewDeviceType" ) ) return false;
			return select( store ).__experimentalGetPreviewDeviceType();
		}
		setViewport( viewport ) {
			var store = ( this.config.editor && typeof this.config.editor !== 'undefined' ) ? "core/edit-site" : "core/edit-post";
			if ( !_.has( dispatch( store ), "__experimentalSetPreviewDeviceType" ) ) return false;
			dispatch( store ).__experimentalSetPreviewDeviceType( viewport );
		}
		getActiveTab( viewport ) {
			var activeTab = "";
			if ( viewport == "Tablet" ) activeTab = "md";
			else if ( viewport == "Mobile" ) activeTab = "sm";
			return activeTab;
		}


		// todo
		makeColorIndicators = function () {
			var colors = [];
			this.props.holdsColors.forEach( function ( value, i ) {
				if ( typeof value.color !== 'undefined' ) {
					var col = greyd.tools.settings.getGradientValue( greyd.tools.settings.getColorValue( value.color ) );
					if ( col != "" ) colors.push( el( ColorIndicator, { colorValue: col, title: value.title } ) );
				}

			} );
			return el( "span", { className: "block-editor-panel-color-gradient-settings__panel-title", style: { display: 'inline-flex' } }, colors );
		};

		makeControls = function ( children, activeTab ) {

			if ( typeof children === 'string' ) {
				// just label or text
				return children;
			}
			else if ( children && children.length ) {
				// make child controls with tab specific controls
				return children.map( ( control ) => {

					if ( control ) {
						if ( _.isArray( control ) ) {
							// controls in nested array
							return this.makeControls( control, activeTab );
						}
						else if ( _.has( control, 'type' ) && _.has( control, 'props' ) ) {
							// child control
							var props = _.clone( control.props );
							if ( _.has( control.props, "children" ) && !_.isEmpty( control.props.children ) ) {
								// make inner controls
								props.children = this.makeControls( control.props.children, activeTab );
							}
							if ( !_.isEmpty( activeTab ) ) {
								// other tab
								if ( _.has( control.props, activeTab ) && !_.isEmpty( control.props[ activeTab ] ) ) {
									// add tab specific controls
									props = { ...props, ...control.props[ activeTab ] };
								}
							}
							return el( control.type, { ...props } );
						}
					}

				} );
			}

		};

		render() {

			const {
				title = "",
				holdsChange = false,
				holdsColors = false,

				// state props
				supportsState = false,
				onStateToggle = this.onStateToggle,
				// responsive props
				supportsResponsive = false,
				onResponsiveToggle = this.onResponsiveToggle,
				// tabs
				onTabSwitch = this.onTabSwitch,
				children = []
			} = this.props;

			const {
				// state state
				isStateEnabled,
				// responsive state
				isResponsiveEnabled,
				// tabs state
				tabs,
				activeTab,
			} = this.state;

			// todo
			if ( holdsColors ) {
				if ( typeof holdsColors === 'object' && holdsColors.length == 0 ) holdsColors = false;
				else {
					var classname = _.has( this.props, 'className' ) ? this.props.className + ' ' : '';
					this.props.className = classname + 'block-editor-panel-color-gradient-settings';
				}
			}

			return el( PanelBody, {
				...this.props,
				title: el( "div", {}, [
					el( "span", {}, title ),
					holdsChange && !holdsColors ? el( "span", { className: "change_holder" } ) : "",
					el( "div", { className: "panel_buttons" }, [
						supportsState && onStateToggle ?
							el( Tooltip, {
								text: __( "change on hover", 'greyd-theme' )
							}, el( "button", {
								className: "button button-ghost" + ( isStateEnabled ? " active" : "" ),
								onClick: ( e ) => {
									e.stopPropagation();
									typeof onStateToggle === "function" && onStateToggle();
								}
							}, el( greyd.components.Icon, {
								icon: "hover",
								width: 12
							} ) )
							) : "",
						!supportsState && supportsResponsive && onResponsiveToggle ?
							el( Tooltip, {
								text: __( "change on screen sizes", 'greyd-theme' )
							}, el( "button", {
								className: "button button-ghost" + ( isResponsiveEnabled ? " active" : "" ),
								onClick: ( e ) => {
									e.stopPropagation();
									typeof onResponsiveToggle === "function" && onResponsiveToggle();
								}
							}, el( greyd.components.Icon, {
								icon: "mobile",
								width: 12
							} ) )
							) : ""
					] ),
				]
				),
				children: [
					// tabs
					tabs.length < 2 ? "" :
						el( "div", { className: "greyd_tabs" },
							tabs.map( ( tab ) => {
								return el( "span", {
									className: "tab" + ( activeTab === tab.slug ? " active" : "" ),
									onClick: () => {
										typeof onTabSwitch === "function" && onTabSwitch( tab.slug );
									}
								}, tab.label );
							} )
						),

					// children controls
					this.makeControls( children, activeTab )

				]
			} );
		}
	};

	/**
	 * ColorGradientPopupControl
	 * Color value is saved as css-variable if possible (eg. "var(--wp--preset--color--foreground)" or "#5D5D5D").
	 * 
	 * @property {string} label Label to be displayed.
	 * @property {string} className Class of component ('single' for full border, 'small' for indicator only).
	 * @property {object} style Additional style of component.
	 * @property {string} mode 'color' or 'gradient', omit property to show both.
	 * @property {bool} enableAlpha enable/disable alpha value in color picker. (default = false)
	 * 
	 * @property {bool} hover Indicator if component is rendered inside hover tab.
	 * @property {object} contrast If set, a ContrastChecker component is rendered
	 *     @property {string} contrast.default Value to compare contrast against.
	 *     @property {string} contrast.hover Value to compare contrast against in hover tab.
	 * 
	 * @property {string} value Current value.
	 * @property {callback} onChange Callback function to be called when value is changed.
	 * 
	 * @returns {object} ColorGradientPopupControl component.
	 */
	greyd.components.GlobalStylesColorGradientPopupControl = class extends Component {
		constructor ( props ) {
			super( props );

			// state
			this.state = {
				id: greyd.tools.generateRandomID(),
				isOpen: false,
				mode: '', color: '', gradient: ''
			};
			this.nextState = '';
		}
		componentWillMount() {
			this.loadValue( this.props );
		}
		componentWillReceiveProps( props ) {
			this.loadValue( props );
		}

		/**
		 * Load value and mode based on props
		 * @param {mixed} props new props object
		 */
		loadValue( props ) {
			var mode = '';
			var color = '';
			var gradient = '';
			// always convert var(--wp--preset--color--xxx) to color internally
			var value = this.convertVarToColor( props.value );
			if ( ! value ) {
				return;
			}
			else if ( _.has( props, 'mode' ) ) {
				mode = props.mode;
				if ( props.mode == 'color' ) color = value;
				if ( props.mode == 'gradient' ) gradient = value;
			}
			else if ( value.indexOf( '#' ) === 0 || value.indexOf( 'rgb' ) === 0 ) {
				mode = 'color';
				color = value;
			}
			else if ( value.indexOf( 'linear-gradient(' ) === 0 || value.indexOf( 'radial-gradient(' ) === 0 ) {
				mode = 'gradient';
				gradient = value;
			}
			else {
				console.log( value );
			}
			this.nextState = mode;
			this.setState( { mode: mode, color: color, gradient: gradient } );
		}

		/**
		 * Get value from state for rendering
		 */
		getValue() {
			var value = '';
			// always convert var(--wp--preset--color--xxx) to color for rendering
			if ( this.state.mode == 'color' ) value = greyd.tools.settings.getColorValue( this.state.color );
			if ( this.state.mode == 'gradient' ) value = greyd.tools.settings.getGradientValue( this.state.gradient );
			return value;
		}

		/**
		 * Handle change and save event
		 * @param {string} mode current mode (color or gradient)
		 * @param {string} value new value
		 */
		setValue( mode, value ) {

			var color = this.state.color;
			var gradient = this.state.gradient;

			if ( typeof value != 'undefined' ) {
				// get var values for saving
				if ( mode == 'color' ) color = this.convertColorToVar( value );
				if ( mode == 'gradient' ) gradient = this.convertGradientToVar( value );

				this.nextState = mode;
				this.setState( { mode: mode, color: color, gradient: gradient } );
				if ( mode == 'color' ) this.props.onChange( color );
				else if ( mode == 'gradient' ) this.props.onChange( gradient );
			}
			else if ( mode == this.nextState ) {
				if ( mode == 'color' ) color = '';
				else if ( mode == 'gradient' ) gradient = '';

				this.nextState = '';
				this.setState( { mode: '', color: color, gradient: gradient } );
				this.props.onChange( '' );
			}
		}

		/**
		 * Convert var(--wp--preset--color--xxx) in gradients to color
		 * or
		 * Convert var(--wp--preset--color--xxx) to color
		 */
		convertVarToColor( value ) {
			if ( !_.isEmpty( value ) ) {
				if ( value.indexOf( 'linear-gradient(' ) === 0 || value.indexOf( 'radial-gradient(' ) === 0 ) {
					return greyd.tools.settings.getGradientValue( value );
				}
				else {
					return greyd.tools.settings.getColorValue( value );
				}
			}
			return value;
		}

		/**
		 * Convert color value to var(--wp--preset--color--xxx)
		 */
		convertColorToVar( value ) {
			if ( !_.isEmpty( value ) ) {
				return greyd.tools.settings.getColorVariable( value );
			}
			return value;
		}

		/**
		 * Convert color values in gradient to var(--wp--preset--color--xxx)
		 */
		convertGradientToVar( value ) {
			if ( !_.isEmpty( value ) ) {
				return greyd.tools.settings.getGradientVariable( value );
			}
			return value;
		}

		render() {

			var hover = _.has( this.props, 'hover' ) && this.props.hover == true ? true : false;
			var showColor = ( !hover || ( hover && this.state.mode != 'gradient' ) );
			var showGradient = ( !hover || ( hover && this.state.mode != 'color' ) );
			var enableAlpha = _.has( this.props, 'enableAlpha' ) && this.props.enableAlpha == true ? true : false;

			var hasLabel = _.has( this.props, 'label' ) && this.props.label != '' ? true : false;
			var isOpen = this.state.isOpen;
			var value = this.getValue();

			return [
				el( 'div', {
					// wrapper
					className: 'color-block-support-panel color_gradient_popup_control' + ( _.has( this.props, 'className' ) ? ' ' + this.props.className : '' ),
					style: { ...this.props.style }
				}, [
					el( 'div', {
						// wrapper
						className: 'block-editor-tools-panel-color-dropdown'
					}, [
						el( Button, {
							// trigger button
							"aria-expanded": isOpen,
							"data-id": this.state.id,
							className: 'block-editor-panel-color-gradient-settings__dropdown' + ( isOpen ? ' is-open' : '' ),
							onClick: () => this.setState( { isOpen: isOpen ? false : true } )
						}, [
							el( HStack, { justify: "flex-start" }, [
								el( ColorIndicator, {
									// color/gradient indicator
									className: "block-editor-panel-color-gradient-settings__color-indicator",
									colorValue: value
								} ),
								// label
								hasLabel && el( FlexItem, {}, this.props.label )
							] ),
							isOpen && el( Popover, {
								// color/gradient popover
								onClick: ( e ) => e.stopPropagation(),
								className: "color_popup_control__popover color_gradient",
								position: "middle left",
								onFocusOutside: ( event ) => {
									if ( typeof event.relatedTarget !== 'undefined' &&
										_.has( event.relatedTarget, "dataset.id" ) &&
										event.relatedTarget.dataset.id == this.state.id ) {
										return;
									}
									this.setState( { isOpen: false } );
								},
							}, [
								el( "div", { className: "color_popup_control__popover_content" }, [
									this.props.mode == 'color' && el( ColorPalette, {
										// only solids
										__experimentalHasMultipleOrigins: true,
										enableAlpha: enableAlpha,
										colors: greyd.tools.settings.getColors(),
										value: value,
										onChange: ( newValue ) => this.setValue( 'color', newValue ),
									} ),
									this.props.mode == 'gradient' && el( GradientPicker, {
										// only gradients
										__experimentalHasMultipleOrigins: true,
										enableAlpha: enableAlpha,
										gradients: greyd.tools.settings.getGradients(),
										value: value,
										onChange: ( newValue ) => this.setValue( 'gradient', newValue ),
									} ),
									!_.has( this.props, 'mode' ) && el( ColorGradientControl, {
										// solids and gradients
										__experimentalHasMultipleOrigins: true,
										enableAlpha: enableAlpha,
										colors: greyd.tools.settings.getColors(),
										gradients: greyd.tools.settings.getGradients(),
										colorValue: ( showColor && this.state.mode == 'color' ) ? value : undefined,
										onColorChange: ( showColor ) ? ( newValue ) => this.setValue( 'color', newValue ) : undefined,
										gradientValue: ( showGradient && this.state.mode == 'gradient' ) ? value : undefined,
										onGradientChange: ( showGradient ) ? ( newValue ) => this.setValue( 'gradient', newValue ) : undefined,
									} )
								] )
							] )
						] )
					] ),
					// contrast checker
					_.has( this.props, 'contrast' ) && this.state.mode == 'color' ? el( ContrastChecker, {
						textColor: greyd.tools.settings.getColorValue( this.convertVarToColor( hover ? this.props.contrast.hover : this.props.contrast.default ) ), // '#fff', 
						backgroundColor: value
					} ) : ''
				] )
			];
		}
	};

	/**
	 * Control for css box-shadow property
	 * 
	 * @property {string} label Optional label to be displayed.
	 * @property {string} value Current value.
	 * @property {object} default var and value of default setup.
	 * @property {callback} onChange Callback function to be called when value is changed.
	 * 
	 * @returns {string} Value in css format. Empty String "" on default or if cleared.
	 */
	greyd.components.GlobalStylesDropShadowControl = class extends Component {
		constructor ( props ) {
			super( props );

			// state
			this.state = {
				value: this.getDefault()
			};
		}
		getDefault() {
			return {
				color: "",
				x: 0,
				y: 10,
				blur: 15,
				spread: 0,
				opacity: 25,
				position: "outset"
			};
		}
		componentWillMount() {
			this.loadValue( this.props );
		}
		componentWillReceiveProps( props ) {
			this.loadValue( props );
		}

		/**
		 * Load value and mode based on props
		 * @param {mixed} props new props object
		 */
		loadValue( props ) {

			var newValue = this.state.value;
			var values = props.value;

			// check default
			if ( _.has( props, "default" ) ) {
				if ( values == props.default.var ) {
					values = props.default.value;
				}
			}

			// read css string
			if ( values && values != "none" ) {
				// read position
				if ( values.indexOf( 'inset' ) == 0 ) {
					newValue.position = 'inset';
					values = values.replace( 'inset ', '' );
				}
				// read sets
				var [ x, y, blur, spread, color ] = values.split( 'px ' );
				var opacity = newValue.opacity;
				// read color
				if ( color && color.indexOf( '#' ) === 0 ) {
					// color = greyd.tools.hex2rgba(color);
					opacity = 100;
				}
				else if ( color && color.indexOf( 'rgb' ) === 0 ) {
					// if a preset has alpha (rgba), the opacity can't be extracted
					// alpha value becomes opacity and solid color stays
					color = greyd.tools.rgbString2rgba( color );
					opacity = color.a * 100.0;
					color = greyd.tools.rgbToHex( color );
				}
				// set value
				newValue = {
					...newValue,
					x: parseInt( x ),
					y: parseInt( y ),
					blur: parseInt( blur ),
					spread: parseInt( spread ),
					opacity: parseInt( opacity ),
					color: color
				};
			}

			// set state
			this.setState( { value: newValue } );
		}

		/**
		 * Handle change and save event
		 * @param {string} name Name of edited sub-value
		 * @param {string} value new value
		 */
		setValue( name, value ) {
			// make new state value
			var newValue = { ...this.state.value, [ name ]: value };

			// make color
			var color = greyd.tools.settings.getColorValue( newValue.color );
			if ( !color || color == 'transparent' || color == '' ) {
				color = { 'r': 0, 'g': 0, 'b': 0, 'a': 0 };
			}
			else if ( color.indexOf( '#' ) === 0 ) {
				color = greyd.tools.hex2rgba( color );
			}
			else if ( color.indexOf( 'rgb' ) === 0 ) {
				color = greyd.tools.rgbString2rgba( color );
			}
			if ( !_.has( color, 'a' ) ) {
				color[ 'a' ] = 1;
			}
			// calculate opacity
			color[ 'a' ] = color[ 'a' ] * ( newValue.opacity / 100.0 );

			// make css string
			var cssValue = newValue.position === "inset" ? "inset " : "";
			cssValue += newValue.x + "px " + newValue.y + "px " + newValue.blur + "px " + newValue.spread + "px ";
			cssValue += 'rgba(' + color[ 'r' ] + ',' + color[ 'g' ] + ',' + color[ 'b' ] + ',' + color[ 'a' ] + ')';

			// check default
			if ( _.has( this.props, "default" ) ) {
				if ( cssValue == this.props.default.value ) {
					cssValue = this.props.default.var;
				}
			}

			// set state and value
			this.setState( { ...this.state, value: newValue } );
			this.props.onChange( cssValue );
		}

		render() {

			var value = this.state.value;

			return [
				el( "div", { className: "drop_shadow_control" }, [
					this.props.label ?
						el( "div", { className: "drop_shadow_control__label" }, [
							el( 'label', {}, this.props.label ),
						] ) : "",
					el( "div", {}, [
						el( greyd.components.GlobalStylesColorGradientPopupControl, {
							label: __( "Color", 'greyd-theme' ),
							mode: 'color',
							value: value.color,
							onChange: ( newValue ) => this.setValue( "color", newValue )
						} )
					] ),
					el( HStack, {}, [
						el( "span", { className: "inner_label" }, __( "Horizontally", 'greyd-theme' ) ),
						el( RangeControl, {
							value: value.x,
							min: -50,
							max: 50,
							onChange: ( newValue ) => this.setValue( "x", newValue )
						} )
					] ),
					el( HStack, {}, [
						el( "span", { className: "inner_label" }, __( "Vertical", 'greyd-theme' ) ),
						el( RangeControl, {
							value: value.y,
							min: -50,
							max: 50,
							onChange: ( newValue ) => this.setValue( "y", newValue )
						} )
					] ),
					el( HStack, {}, [
						el( "span", { className: "inner_label" }, __( "Blur", 'greyd-theme' ) ),
						el( RangeControl, {
							value: value.blur,
							min: 0,
							max: 50,
							onChange: ( newValue ) => this.setValue( "blur", newValue )
						} )
					] ),
					el( HStack, {}, [
						el( "span", { className: "inner_label" }, __( "Spread", 'greyd-theme' ) ),
						el( RangeControl, {
							value: value.spread,
							min: -50,
							max: 50,
							onChange: ( newValue ) => this.setValue( "spread", newValue )
						} )
					] ),
					el( HStack, {}, [
						el( "span", { className: "inner_label" }, __( "Opacity", 'greyd-theme' ) ),
						el( RangeControl, {
							value: value.opacity,
							min: 0,
							max: 100,
							onChange: ( newValue ) => this.setValue( "opacity", newValue )
						} )
					] ),
					el( HStack, {}, [
						el( "span", { className: "inner_label" }, __( "Position", 'greyd-theme' ) ),
						el( greyd.components.ButtonGroupControl, {
							value: value.position,
							options: [
								{
									label: __( "outset", 'greyd-theme' ),
									value: "outset"
								},
								{
									label: __( "inset", 'greyd-theme' ),
									value: "inset"
								},
							],
							onChange: ( newValue ) => this.setValue( "position", newValue )
						} )
					] ),
				] )
			];
		}
	};

} )( window.wp );
