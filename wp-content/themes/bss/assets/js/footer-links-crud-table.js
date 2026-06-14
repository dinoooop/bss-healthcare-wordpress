jQuery(document).ready(function ($) {

    function initLinkTable(tableSelector, inputSelector) {

        let table = $(tableSelector);
        let hiddenInput = $(inputSelector);

        let tableData = hiddenInput.val();
        let initialData = [];

        if (tableData) {
            initialData = JSON.parse(tableData);
        }

        function getNewRowHtml(newOrder) {
            return `<tr class="newRow">
                        ${getInnerRowInputHtml(newOrder)}
                    </tr>`;
        }

        function getInnerRowInputHtml(order, item = {}) {
            return `
                <td>
                    <input type="text" class="label" value="${item.label || ''}">
                </td>
                <td>
                    <input type="text" class="url regular-text" value="${item.url || ''}">
                </td>
                <td>
                    <input type="hidden" class="order" value="${order}">
                    <button type="button" class="saveRow">Save</button>
                </td>
            `;
        }

        function getRowHtml(item) {
            return `<tr class="dataRow">
                        ${getInnerRowHtml(item)}
                    </tr>`;
        }

        function getInnerRowHtml(item) {
            return `
                <td>${item.label}</td>
                <td>${item.url}</td>
                <td>
                    <input type="hidden" class="order" value="${item.order}">
                    <button type="button" class="addRow">+</button>
                    <button type="button" class="deleteRow">-</button>
                    <button type="button" class="editRow">Edit</button>
                </td>
            `;
        }

        function updateHiddenInput() {
            initialData.sort((a, b) => a.order - b.order);
            hiddenInput.val(JSON.stringify(initialData));
        }

        function renderTable() {

            table.find('tr.dataRow').remove();
            table.find('tr.newRow').remove();

            initialData
                .sort((a, b) => a.order - b.order)
                .forEach(item => {
                    table.append(getRowHtml(item));
                });

            if (initialData.length === 0) {
                table.append(getNewRowHtml(1));
            }
        }

        renderTable();

        table.on('click', '.addRow', function () {

            let currentRow = $(this).closest('tr');

            if (currentRow.next().hasClass('newRow')) {
                return;
            }

            let beforeOrder = parseFloat(
                currentRow.find('.order').val()
            );

            let nextRow = currentRow.nextAll('tr:not(.newRow)').first();

            let afterOrder;

            if (nextRow.length) {
                afterOrder = parseFloat(
                    nextRow.find('.order').val()
                );
            }

            let newOrder;

            if (!isNaN(beforeOrder) && !isNaN(afterOrder)) {
                newOrder = (beforeOrder + afterOrder) / 2;
            } else if (!isNaN(beforeOrder)) {
                newOrder = beforeOrder + 1;
            } else if (!isNaN(afterOrder)) {
                newOrder = afterOrder / 2;
            } else {
                newOrder = 1;
            }

            currentRow.after(
                getNewRowHtml(newOrder)
            );
        });

        table.on('click', '.editRow', function () {

            let row = $(this).closest('tr');

            let order = parseFloat(
                row.find('.order').val()
            );

            let item = initialData.find(
                item => item.order == order
            );

            row.html(
                getInnerRowInputHtml(order, item)
            );
        });

        table.on('click', '.saveRow', function () {

            let row = $(this).closest('tr');

            let saveItem = {
                label: row.find('.label').val(),
                url: row.find('.url').val(),
                order: parseFloat(
                    row.find('.order').val()
                )
            };

            let isExisting = initialData.find(
                item => item.order == saveItem.order
            );

            if (isExisting) {

                initialData = initialData.map(item => {

                    if (item.order == saveItem.order) {
                        return saveItem;
                    }

                    return item;
                });

            } else {

                initialData.push(saveItem);
            }

            updateHiddenInput();

            row.removeClass('newRow');
            row.html(
                getInnerRowHtml(saveItem)
            );
        });

        table.on('click', '.deleteRow', function () {

            let row = $(this).closest('tr');

            let order = parseFloat(
                row.find('.order').val()
            );

            initialData = initialData.filter(
                item => item.order !== order
            );

            updateHiddenInput();

            row.remove();

            if (
                table.find('tr.dataRow').length === 0 &&
                table.find('tr.newRow').length === 0
            ) {
                table.append(
                    getNewRowHtml(1)
                );
            }
        });
    }

    initLinkTable(
        '#footer-link-set-table-1',
        '#bss_footer_link_set_1'
    );

    initLinkTable(
        '#footer-link-set-table-2',
        '#bss_footer_link_set_2'
    );

});