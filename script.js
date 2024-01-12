window.addEventListener('DOMContentLoaded', (event) => {
    const canvas = document.getElementById('pieChartCanvas');
    const context = canvas.getContext('2d');
  
    // Set up the pie chart
    const data = [
      { label: 'total wowmen', value: 30, color: '#ff6384' },
      { label: 'casualities', value: 20, color: '#36a2eb' },
      { label: 'total men', value: 50, color: '#ffce56' }
      { label: 'total men', value: 10, color: '#ffce56' }
    ];
  
    const total = data.reduce((sum, item) => sum + item.value, 0);
    let startAngle = 0;
  
    // Draw the pie slices
    for (let i = 0; i < data.length; i++) {
      const sliceAngle = (data[i].value / total) * 2 * Math.PI;
  
      context.beginPath();
      context.moveTo(canvas.width / 2, canvas.height / 2);
      context.arc(canvas.width / 2, canvas.height / 2, canvas.width / 2 - 20, startAngle, startAngle + sliceAngle);
      context.closePath();
      context.fillStyle = data[i].color;
      context.fill();
  
      startAngle += sliceAngle;
    }
  
    // Draw the legend
    let legendX = 20;
    let legendY = 20;
    const legendItemSize = 20;
  
    for (let i = 0; i < data.length; i++) {
      context.fillStyle = data[i].color;
      context.fillRect(legendX, legendY, legendItemSize, legendItemSize);
  
      context.font = '12px Arial';
      context.fillStyle = '#000';
      context.fillText(data[i].label, legendX + legendItemSize + 5, legendY + legendItemSize - 5);
  
      legendY += legendItemSize + 5;
    }
  })