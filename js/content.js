// Добавляем возможность "горячего" обновления в development режиме
let contentData = {
  home: {
    hero: {
      title: "Портал данных - для торговли, кооперации, инвестиций",
      description: [
        "Сервис ПорталДанных.РФ на уровне метаданных автоматически соединяет информацию о потребностях покупателей с предложениями поставщиков и не только.",
        "Еще никогда поиск клиентов и поставщиков не был таким простым и быстрым."
      ],
      buttonText: "Подключиться"
    },
    // ... остальные данные
  }
};

// Для разработки: добавляем возможность обновления данных
if (process.env.NODE_ENV === 'development') {
  window.updateContentData = (newData) => {
    contentData = {...contentData, ...newData};
    console.log('Content data updated!');
    return contentData;
  };
}

export { contentData };