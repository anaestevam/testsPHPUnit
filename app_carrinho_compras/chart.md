## 📊 Documentação de Report do Tipo **Chart**

O report também pode ser utilizado para gerar **gráficos** com base nos dados retornados de uma pipeline definida. O gráfico pode ser do tipo `bar`, `line` ou `pie`.

---

### 🧱 Estrutura Geral

```ruby
report :<nome_do_report>, name: "<Nome legível do relatório>", header: true, size: <tamanho>, styles: <estilo>, data: {
  resource: "<nome_da_resource>",         # Nome da collection utilizada pela pipeline
  scope: :<escopo>,                       # Escopo do report (ex: :all)
  where: { <filtros> },                   # Filtros dinâmicos
  pipeline: :<nome_da_pipeline>           # Método responsável por retornar os dados para o chart
} do
  chart :<nome_chart>, resources: :<nome_da_pipeline>, type: :<tipo>, dynamic_labels: <boolean>, series: [
    { name: "<nome do campo de valor>", label: "<nome da legenda>", backgroundColor: "<cor>", type: "<tipo_da_série>" }
  ], size: <tamanho>, styles: { <estilos> }
end
```

---

### ⚙️ Parâmetros

#### No bloco `report`
| Campo        | Descrição |
|--------------|-----------|
| `:name`      | Nome descritivo do relatório. |
| `:header`    | Define se o título será exibido. |
| `:size`      | Largura do componente (1 a 12). |
| `:styles`    | Estilo aplicado ao container do relatório. |
| `:data`      | Configurações de entrada da pipeline, filtros e origem dos dados. |

#### Campo `data`
| Chave         | Descrição |
|---------------|-----------|
| `resource`    | Nome da collection usada pela pipeline. |
| `scope`       | Escopo aplicado nos dados. Pode ser `:all` |
| `where`       | Filtros aplicados dinamicamente. Exemplo: `{ last_sale_at: ":last_sale_at" }` |
| `pipeline`    | Método que retorna os dados formatados para o gráfico. |

---

### 📈 Bloco `chart`

| Campo         | Descrição |
|---------------|-----------|
| `resources`   | **Deve ter o mesmo nome da pipeline** definida acima, pois esse campo determina de onde os dados serão lidos para gerar o gráfico. |
| `type`        | Tipo do gráfico: `:bar`, `:line`, ou `:pie`. |
| `dynamic_labels` | Quando `true`, o array retornado da pipeline já deve conter as labels. |
| `series`      | Define as séries (conjuntos de dados) do gráfico. Pode incluir múltiplos tipos (ex: barras e linhas no mesmo gráfico). |
| `size`        | Tamanho do gráfico (de 1 a 12). |
| `styles`      | Estilo específico para o gráfico (ex: altura fixa, alinhamento vertical, etc.). |

---

### 🧪 Exemplo Prático

```ruby
report :customers_stars_report, name: "Classificação de clientes por estrelas", header: true, size: 9, styles: @@style_component_container_stretch, data: {
  resource: "customers",
  scope: :all,
  where: { last_sale_at: ":last_sale_at" },
  pipeline: :customers_stars_pipeline
} do
  chart :customer_starts_chart, resources: :customers_stars_pipeline, type: :bar, dynamic_labels: true, series: [
    { name: "value", label: "Clientes", backgroundColor: "#6263ac", type: "bar" }
  ], size: 12, styles: { fixed_height: "250px", vertical_align: { body: "top" } }
end
```

---

### 💡 Observações Importantes

- O campo `resources` **deve** ter o mesmo nome do método definido em `pipeline`, pois o gráfico usará os dados retornados dessa função.
- O campo `series` pode misturar `bar` e `line` em um mesmo gráfico, permitindo gráficos combinados.
- `dynamic_labels: true` exige que os dados da pipeline venham no formato:

```ruby
[
  { label: "5 Estrelas", value: 12 },
  { label: "4 Estrelas", value: 8 },
  ...
]
```