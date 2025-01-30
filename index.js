const btn = document.getElementById('btn');
// form.style.visibility = 'hidden';
btn.addEventListener('click', () => {
  const form = document.getElementById('form');
  
  if (form.style.visibility === 'hidden') {
    form.style.visibility = 'visible';
    form1.style.visibility = 'hidden';
  } else {
    form.style.visibility = 'hidden';
    form1.style.visibility = 'visible'
  }
});

const btn1 = document.getElementById('btn1');
form1.style.visibility = 'hidden';
btn1.addEventListener('click', () => {
  const form1 = document.getElementById('form1');
  
  if (form1.style.visibility === 'hidden') {
    form.style.visibility = 'hidden';
    form1.style.visibility = 'visible';
  } else {
    form.style.visibility = 'visible';
    form1.style.visibility = 'hidden';
  }
});
