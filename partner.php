<?php 
$pageTitle = "Партнерская компания";
$pageDescription = "Информация о компании-партнере, её продукции, ценах и остатках.";
include 'elements/header.php'; 
?>
<main class="main">
  <div class="_container">
    <div class="dashboard">
      <h2 class="section-title" style="margin-bottom: 30px;">Титульный бренд</h2>
      <div class="form-group">
        <label class="form-label" for="company-name">Название компании</label>
        <div class="form-input form-input--readonly" id="company-name">ООО "ТехноПартнер"</div>
      </div>
      <div class="form-group">
        <label class="form-label" for="company-inn">ИНН</label>
        <div class="form-input form-input--readonly" id="company-inn">7712345678</div>
      </div>
      <div class="form-group">
        <label class="form-label">Перечень продукции</label>
        <div id="products-table-wrapper">
          <div class="form-text">Загрузка продукции...</div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php include 'elements/footer.php'; ?>
<script>
// Пример асинхронной загрузки продукции
const products = [
  { name: 'Товар 1', price: 1200, stock: 15 },
  { name: 'Товар 2', price: 850, stock: 0 },
  { name: 'Товар 3', price: 1999, stock: 7 },
];

function renderProductsTable(data) {
  if (!data.length) return '<div class="form-text">Нет продукции</div>';
  let html = `<table class="products-table" style="width:100%;margin-top:10px;">
    <thead>
      <tr>
        <th style="text-align:left;padding:8px 12px;">Наименование</th>
        <th style="text-align:right;padding:8px 12px;">Цена, ₽</th>
        <th style="text-align:right;padding:8px 12px;">Остаток</th>
      </tr>
    </thead>
    <tbody>`;
  html += data.map(item => `
    <tr>
      <td style="padding:8px 12px;">${item.name}</td>
      <td style="text-align:right;padding:8px 12px;">${item.price.toLocaleString()}</td>
      <td style="text-align:right;padding:8px 12px;">${item.stock}</td>
    </tr>`).join('');
  html += '</tbody></table>';
  return html;
}

document.addEventListener('DOMContentLoaded', () => {
  // Здесь можно заменить на fetch('/api/products?...')
  setTimeout(() => {
    document.getElementById('products-table-wrapper').innerHTML = renderProductsTable(products);
  }, 600);
});
</script>
<style>
.products-table {
  border-collapse: collapse;
  width: 100%;
  font-size: 16px;
}
.products-table th, .products-table td {
  border-bottom: 1px solid #eee;
}
.products-table th {
  background: #f5f5f5;
  font-weight: 600;
}
.form-input--readonly {
  background: #f5f5f5;
  color: #888;
  cursor: default;
  user-select: text;
  border: 1px solid #eee;
  border-radius: 12px;
  padding: 14px 16px;
  font-size: 16px;
  min-height: 48px;
  display: flex;
  align-items: center;
}
</style> 