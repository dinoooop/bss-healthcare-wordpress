jQuery(document).ready(function ($) {


    let theTableData = $('#bss_feature_items').val();
    let initialData = [];

    if (theTableData) {
        initialData = JSON.parse(theTableData);
    } else {
        initialData = [];
    }

    function getNewRowHtml(newOrder) {
        return `<tr class="newRow">
                    ${getInnerRowInputHtml(newOrder)}
                </tr>`;
    }


    function getInnerRowInputHtml(order, item = {}) {
        return `<td><input type="text" class="feature_name" value="${item.feature_name || ''}"></td>
                <td>
                    <button type="button" class="select-icon-btn">
                        ${item.icon ? `<i class="${item.icon}"></i>` : 'Select Icon'}
                    </button>
                    <input type="hidden" class="icon" value="${item.icon || ''}">
                </td>
                <td>
                    <input type="hidden" class="order" value="${order}">
                    <button type="button" class="saveRow">Save</button>
                </td>`;
    }


    function getRowHtml(item) {
        return `<tr class="dataRow">
                    ${getInnerRowHtml(item)}
                </tr>`;
    }

    function getInnerRowHtml(item) {
        return `<td>${item.feature_name}</td>
                <td>
                    <button type="button" class="select-icon-btn">
                        <i class="${item.icon}"></i>
                    </button>
                    <input type="hidden" class="icon" value="${item.icon}">
                </td>
                <td>
                    <input type="hidden" class="order" value="${item.order}">
                    <button type="button" class="addRow">+</button>
                    <button type="button" class="deleteRow">-</button>
                    <button type="button" class="editRow">Edit</button>
                </td>`;
    }


    function renderTable() {

        let table = $('#feature-table');

        table.find('tr.dataRow').remove();

        initialData
            .sort((a, b) => a.order - b.order)
            .forEach(item => {
                table.append(getRowHtml(item));
            });

        if (initialData.length === 0) {
            let newOrder = 1;
            table.append(getNewRowHtml(newOrder));
        }
    }

    renderTable();


    // Display create form
    $(document).on('click', '.addRow', function () {

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

        currentRow.after(getNewRowHtml(newOrder));
    });

    // Display edit form
    $(document).on('click', '.editRow', function () {
        let row = $(this).closest('tr');        
        let order = parseFloat(row.find('.order').val());
        let item = initialData.find(item => item.order == order);
        row.html(getInnerRowInputHtml(order, item));
    });


    $(document).on('click', '.saveRow', function () {

        let row = $(this).closest('tr');

        let saveItem = {
            feature_name: row.find('.feature_name').val(),
            icon: row.find('.icon').val(),
            order: parseFloat(row.find('.order').val()),
        };

        let isExisting = initialData.find(item => item.order == saveItem.order);
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

        
        initialData.sort((a, b) => a.order - b.order);
        console.log(initialData);
        $('#bss_feature_items').val(JSON.stringify(initialData));

        row.removeClass('newRow');
        row.html(getInnerRowHtml(saveItem));

    });


    $(document).on('click', '.deleteRow', function () {
        let row = $(this).closest('tr');
        let order = parseFloat(row.find('.order').val());
        initialData = initialData.filter(item => item.order !== order);
        console.log(initialData);
        $('#bss_feature_items').val(JSON.stringify(initialData));
        row.remove();
    });

});