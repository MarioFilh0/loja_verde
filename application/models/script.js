function openModal() {
    document.getElementById('confirmModal').style.display = 'block';
  }
  
  function closeModal() {
    document.getElementById('confirmModal').style.display = 'none';
  }
  

  function confirmDelete() {
    console.log('Item excluído!');
    closeModal();
  }
  