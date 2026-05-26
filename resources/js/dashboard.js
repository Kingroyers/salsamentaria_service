
    // Live date
    function updateDate() {
        const now = new Date();
        const opts = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric' };
        document.getElementById('liveDate').textContent = now.toLocaleDateString('es-CO', opts);
    }
    updateDate();

    // Active nav
    function setActive(el) {
        document.querySelectorAll('.nav-item').forEach(i => i.classList.remove('active'));
        el.classList.add('active');
    }

    // Build bar chart
    const salesData = [
        { day: 'Lun', val: 620000 },
        { day: 'Mar', val: 880000 },
        { day: 'Mié', val: 540000 },
        { day: 'Jue', val: 970000 },
        { day: 'Vie', val: 1100000 },
        { day: 'Sáb', val: 1350000 },
        { day: 'Hoy', val: 847500, today: true },
    ];

    const maxVal = Math.max(...salesData.map(d => d.val));
    const barsEl = document.getElementById('chartBars');
    const labelsEl = document.getElementById('chartLabels');

    salesData.forEach(d => {
        const pct = Math.round((d.val / maxVal) * 100);
        const col = document.createElement('div');
        col.className = 'chart-col';
        const bar = document.createElement('div');
        bar.className = 'chart-bar' + (d.today ? ' today' : '');
        bar.style.height = pct + '%';
        bar.title = '$' + d.val.toLocaleString('es-CO');
        col.appendChild(bar);
        barsEl.appendChild(col);

        const lbl = document.createElement('div');
        lbl.className = 'chart-lbl' + (d.today ? ' today' : '');
        lbl.textContent = d.day;
        labelsEl.appendChild(lbl);
    });

    function updateDate() {

    const now = new Date();

    const opts = {
        weekday: 'short',
        year: 'numeric',
        month: 'short',
        day: 'numeric'
    };

    document.getElementById('liveDate').textContent =
        now.toLocaleDateString('es-CO', opts);
}

updateDate();

function setActive(el) {

    document
        .querySelectorAll('.nav-item')
        .forEach(i => i.classList.remove('active'));

    el.classList.add('active');
}
