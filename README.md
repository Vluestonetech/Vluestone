# 🚀 Vluestone Technology - Site Institucional

Este projeto é a versão moderna e otimizada do site institucional da **Vluestone**, migrada de HTML estático para o framework **Astro**.

---

## 🌟 O que é o Astro?

O **Astro** é um framework moderno para criação de sites ultrarrápidos. A grande vantagem de usar o Astro neste projeto é a **componentização**.

Imagine que o site é feito de peças de LEGO:
- O menu (NavBar) é uma peça.
- O rodapé (Footer) é outra peça.
- O layout das páginas é a base onde encaixamos essas peças.

Dessa forma, se você quiser mudar o link do WhatsApp no rodapé, você altera apenas **um arquivo** (`Footer.astro`) e a mudança reflete automaticamente em todas as páginas do site!

---

## 📂 Estrutura de Pastas

Para facilitar a manutenção, o projeto está organizado da seguinte forma:

```text
/
├── public/              # 🖼️ Arquivos estáticos (Imagens, Fontes, Scripts externos)
│   ├── css/             # Estilos do site (Bootstrap, customizados)
│   ├── img/             # Todas as fotos e logos
│   ├── js/              # Scripts de animação e interatividade
│   └── lib/             # Bibliotecas externas (Owl Carousel, WOW.js)
├── src/                 # 🏗️ Onde a mágica acontece (Código fonte)
│   ├── components/      # Peças reutilizáveis (Menu, Rodapé, Topo)
│   ├── layouts/         # Modelos de página (Estrutura principal)
│   └── pages/           # 📄 As páginas reais do seu site (index, sobre, contato, etc.)
├── package.json         # Configurações de dependências
└── astro.config.mjs     # Configurações do framework Astro
```

---

## 🔗 URLs Amigáveis (Rotas)

As páginas dentro de `src/pages/` definem automaticamente o endereço do site. Por exemplo:
- `index.astro` ➔ `seusite.com/` (Página Inicial)
- `sobre.astro` ➔ `seusite.com/sobre`
- `contato.astro` ➔ `seusite.com/contato`
- `servicos.astro` ➔ `seusite.com/servicos`

Isso elimina a necessidade do antigo `.html` no final dos endereços, tornando o site muito mais profissional e fácil de navegar.

---

## 🛠️ Como dar manutenção

### 1. Requisitos
Você precisará do [Node.js](https://nodejs.org/) instalado em seu computador (Recomendado: Versão 22 ou superior).

### 2. Comandos Principais

No terminal da pasta do projeto, você usará estes comandos:

| Comando | O que ele faz? |
| :--- | :--- |
| `npm install` | Baixa as ferramentas necessárias para o projeto funcionar. |
| `npm run dev` | Inicia o site em modo de teste (você vê as mudanças na hora). |
| `npm run build` | Cria a versão final do site para ser enviada ao servidor (pasta `/dist`). |

---

## 🚀 Como fazer o Deploy (Subir o site)

### No GitHub Pages
Se você utiliza o GitHub Pages e o projeto estiver em uma subpasta (como `usuario.github.io/Vluestone/`):
1. Abra o arquivo `astro.config.mjs`.
2. Adicione `base: '/Vluestone'` dentro de `defineConfig`.
3. Rode `npm run build` e envie o conteúdo da pasta `dist` para o seu repositório.

### Na Hostinger (via FTP)
1. **Gere os arquivos**: No terminal, rode `npm run build`. Isso criará a pasta `dist/`.
2. **Conecte via FTP**: Use um programa como o **FileZilla** com os dados de acesso da Hostinger (Host, Usuário, Senha).
3. **Localize a pasta certa**: No servidor, entre na pasta `public_html/`.
4. **Envie os arquivos**: Arraste tudo o que está **dentro** da pasta `dist/` do seu computador para dentro da `public_html/` no servidor.
5. **Dica**: O arquivo `.htaccess` criado no projeto garante que as URLs amigáveis funcionem perfeitamente.

---

## 👨‍💻 Desenvolvido com ❤️
Este projeto foi migrado e otimizado para garantir a melhor experiência para os clientes da **Vluestone Technology**.
